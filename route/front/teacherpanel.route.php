<?php
use Models\Classroom;
use Models\Level;
use Models\Classchedule;
use Models\Mock;
use Models\Mockquestion;
use Models\Callback;
use Models\Exam;
use Models\Note;
use Controllers\ResultController;
$app->group('/teacherpanel',function($app)use($Views){
    $app->get('/', function ($request,  $response) use($Views) {
        echo $Views->make('teacherpanel.dashboard');
    });
    
    $app->get('/attendance/', function ($request,  $response) use($Views) {
        echo $Views->make('teacherpanel.attendance',["classrooms"=>Classroom::all()]);
    });

    // note upload
    $app->get('/add/note/', function ($request,  $response) use($Views) {
        echo $Views->make('teacherpanel.addnote',['levels'=>Level::all(),'teacher'=>$this->auth->getUser()]);
    });

    $app->post('/add/note/', function ($request,  $response) use($Views) {
        $parsedBody = $request->getParsedBody();
        // $note = Note::create($parsedBody);
        $note = new Note();
        $note->title = $parsedBody['title'];
        $note->level_id = $parsedBody['level_id'];
        $note->description = $parsedBody['description'];
        $uploadedFile=$request->getUploadedFiles()['file'];
        $directory="asset/notes";
        $uf=$uploadedFile;
        $filename = $uf->name;   
        $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
        $note->file=$directory . DIRECTORY_SEPARATOR . $filename;
        $note->filename= $filename;
        $note->teacher_id = $parsedBody['teacher_id'];
        $note->save();
        return $response->withRedirect('/teacherpanel/note/list/');
    });

    $app->get('/note/list/', function ($request,  $response) use($Views) {
        $teacher=$this->auth->getUser();
        echo $Views->make('teacherpanel.listnote',['notes'=>Note::where('teacher_id',$teacher->id)->get()]);
    });

    $app->get('/note/edit/{id}/', function ($request,  $response, $args) use($Views) {
        echo $Views->make('teacherpanel.editnote',['note'=>Note::where('id',$args['id'])->first(),'levels'=>Level::all(),'teacher'=>$this->auth->getUser()]);
    });

    $app->post('/note/edit/{id}/', function ($request,  $response, $args) use($Views) {
        $parsedBody = $request->getParsedBody();
        
        $note = Note::where('id',$args)->first();
        $note->title = $parsedBody['title'];
        $note->level_id = $parsedBody['level_id'];
        $note->description = $parsedBody['description'];

        if(isset($request->getUploadedFiles()['file'])){
            $uploadedFile=$request->getUploadedFiles()['file'];
                    $directory="asset/notes";
                    $uf=$uploadedFile;
                    $filename = $uf->name;

                    if($filename!=""){  
                        $note->filename= $filename; 
                        $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                        $note->file=$directory . DIRECTORY_SEPARATOR . $filename;
                    }
            }
        $note->teacher_id = $parsedBody['teacher_id'];
        $note->save();
        return $response->withRedirect('/teacherpanel/note/list/');
    });
    // end note route


    // result in teacher panel

    $app->get('/result/', function ($request,  $response) use($Views) {
        echo $Views->make('teacherpanel.result',['exams'=>Exam::all()]);
    });

    $app->get('/result/examsubject/{id}/marks/', function ($request,  $response,$args) use($Views) {
        $marks=new ResultController();
        $marks->loaddata($args['id']);
        // print_r($marks);
        echo $Views->make('teacherpanel.marks',['marks'=>$marks ]);
    });
    $app->post('/result/examsubject/{id}/marks/', function ($request,  $response,$args) use($Views) {
        $parsedBody=$request->getParsedBody();
        $marks=new ResultController();
        $marks->loaddata($args['id']);
        foreach ($parsedBody as $key => $value) {
            if(stripos($key,'mark-') !== false){
                // echo "student id= ".substr($key,5-strlen($key)).'<hr>';
                $marks->set(intval(substr($key,5-strlen($key))),$value);
                // echo $key.",".$value.'<hr>';
            }   
        }
        $marks1=new ResultController();
        $marks1->loaddata($args['id']);
        echo $Views->make('teacherpanel.marks',['marks'=>$marks ]);
    });

    // end result





    $app->get('/logout/', function ($request,  $response) use($Views) {
        unset($_SESSION['auth']);
        return $response->withRedirect('/');
    });

    $app->get('/schedule/', function ($request,  $response) use($Views) {
        $teacher=$this->auth->getUser();
        echo $Views->make('teacherpanel.schedule',['cls'=>Classchedule::where('teacher_id',$teacher->id)->get()]);
    });

    
    $app->get('/mockquestion/', function ($request,  $response) use($Views) {
        echo $Views->make('teacherpanel.mockquestion',['mocks'=>Mock::all()]);
    });

    $app->post('/mockquestion/add/', function ($request,  $response) use($Views) {
          $parsed = $request->getParsedBody();
          $teacher=$this->auth->getUser();
          $parsed['teacher_id'] = $teacher->id;
        //   print_r($parsed);
          $mockq = Mockquestion::create($parsed);
          return $response->withJson(new Callback(['mockq'=>$mockq]));
    });

    $app->get('/mockquestion/list/{id}/', function ($request,  $response, $args) use($Views) {
        echo $Views->make('teacherpanel.mockquestionlist',['mockq'=>Mockquestion::where('mock_id',$args)->where('teacher_id',$this->auth->getUser()->id)->get()]);
    });

    $app->post('/mockquestion/edit/', function ($request,  $response ,$args) use($Views) {
        $parsed = $request->getParsedBody();
      //   print_r($parsed);
        $mockq = Mockquestion::where('id', $parsed['id'])->first();
        $mockq->update($parsed);
        return $response->withJson(new Callback(['mockq'=>$mockq]));

    });
        $app->post('/changepassword/', function ($request,  $response, $args) use($Views) {
                $teacher=$this->auth->getUser();
                $pc = Models\Teacher::where('id',$teacher->id)->first();
                $parsed = $request->getParsedBody();
                $oldpass=md5($parsed['oldpass']);
                $newpass=md5($parsed['newpass']);
                if($oldpass==$pc->password){
                    $pc->password=$newpass;
                    $pc->save();
                    $_SESSION['successchangepass']="Password changed";
                }else{
                    $_SESSION['errorchangepass']="Wrong password";
                }
                return $response->withRedirect("/teacherpanel/");
        });

 
})->add(function($request,$response,$next){
    if($this->auth->isLoged()){
        if($this->auth->role(teacher)){
            return $next($request,$response);
        }
    }
    return $response->withRedirect("/");
});




