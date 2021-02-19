<?php 
use Models\Receit;
use Models\Receititem;
use Models\Studentparent;
use Models\Student;
use Models\Parentfee;
use Models\Parentfeeitem;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Controllers\SmsController;
use Controllers\FirebaseController;
use Controllers\ReceiptController;


$app->group("/admin/receit",function($app)use($Views){
    $app->get("/add/",function($request,$response)use($Views){
        echo $Views->make("back.receit.add");
    });

    $app->post("/sendduenotification/",function($request,$response){
        $parsed=$request->getParsedBody();
        $receiptcontroller=new ReceiptController(Receit::find($parsed['id']));
        $receiptcontroller->sendDueMessage();
    });

    // $app->get("/{id}/",function($request,$response)use($Views){
        
    // });

    $app->get("/list/",function($request,$response)use($Views){
        echo $Views->make("back.receit.list",['receits'=>Receit::all()]);
    });
    $app->get("/test/",function($request,$response)use($Views){
        $serverkey="AIzaSyDO3d7Rey45KIoPyUbU_dgjh6rnVgNW-Ys";
        $tokens=['cNtgl3TH9S0:APA91bFs0057vP2d21mlYuF9a-6OgZoiVYmi0t5-lujeJnC6R0NkV6N__QvsF0LgC7o5b5sOpc7fLebzX6m6gMRKVMS7M7YWUPcXRbqeEtb96TqvrXbR0pqtlbwks0-uubxsjXbZzUAh'];
        $header=['Authorization: key='.$serverkey,'Content-Type: Application/json'];
        $msg=[
            'title'=>'test',
            'body'=>'hello world',
        ];

        $payload=[
            'registration_ids'=>$tokens,
            'data'=>$msg
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER =>$header,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
        // $messaging = $this->firebase->getMessaging();
        // // echo $Views->make("back.receit.add");
        // echo "<pre>";
        // print_r($messaging);
        // echo "</pre>";
        //                     $notification = Notification::fromArray([
        //                         'title' =>"zxcZXc",
        //                         'body' => "hell man how are you"
        //                         ]);
        //                         $message = CloudMessage::withTarget('token',"daNEVxILgSA:APA91bGLqcpuoZmOpAJtwzlP2r19v5q6uTZv1_4Km4bxt66VdNAS78Rxa17oyYz6Hf4jnd5MYr04DmoDUnjPRvBlxX4nupFuyfGfFZmDdi6YN8dghsahY-iEGLC4xwrDuw54HqGZc-4s")
        //                         ->withNotification($notification);
        // echo "<pre>";
        // print_r($messaging->send($message));
        // echo "</pre>";

    });

    $app->post("/add/",function($request,$response)use($Views){
        $parsed= $request->getParsedBody();
        $receit=new Receit();
        $receit->title=$parsed['title'];
        $receit->issuedate=new \DateTime();
        $receit->totalamount=$parsed['total'];
        $receit->save();
        for ($i=0; $i < $parsed['billitemcount']; $i++) { 
            $receititem=new Receititem();
            $receititem->receit_id=$receit->id;
            $receititem->particular=$parsed['particular'][$i];
            $receititem->rate=$parsed['rate'][$i];
            $receititem->qty=$parsed['qty'][$i];
            $receititem->total=$parsed['qty'][$i]*$parsed['rate'][$i];
            $receititem->save();
           
        }
        
        foreach ($parsed['students'] as $student_id) {
            $parent_id=Student::find($student_id)->studentparent_id;
            $parentfee=new Parentfee();
            $parentfee->totalamount=$parsed['total'];
            $parentfee->discount=$parsed['discount'];
            $parentfee->due=$parsed['total'];
            $parentfee->paid=0;
            $parentfee->title=$parsed['title'];
            $parentfee->studentparent_id=$parent_id;
            $parentfee->receit_id=$receit->id;
            $parentfee->student_id=$student_id;
            $parentfee->duedate=$parsed['duedate'];
            $parentfee->issuedate=$parsed['issuedate'];
            $parentfee->save();       
            // $callback=SmsController::sendParent($parent_id,$parentfee);
            $callback=FirebaseController::sendFeeMessageToParent($parent_id,$parentfee);
            // if($callback->success){
            //     echo $callback->data['response']."<hr>";
            // }else{
            //     echo $callback->error."<hr>";
            // }

        }
    });
});