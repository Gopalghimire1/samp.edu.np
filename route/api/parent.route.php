<?php 
use Models\Student;
use Models\Studentparent;
use Models\Attendance;
use Models\Result;
use Models\Exam;
use Controllers\ResultController;
use \Controllers\ResultViwer;
use Models\Callback;
$app->group("/api/parent",function($app){
    
    $app->get('/{id}/', function ($request, $response, $args){
         return $response->withJson(new Callback(['parent'=>Studentparent::where('id',$args)->first()]));
    });
    $app->get('{id}/students/',function ($request, $response, $args){
        return $response->withJson(new Callback(['students'=>Student::where('studentparent_id',$args)->get()]));
   });

   
    $app->post('/add/', function ($request, $response){
        $parsedBody = $request->getParsedBody();
        $par=new Studentparent();
        $par->name=$parsedBody['name'];
        $par->adress=$parsedBody['adress'];
        $par->email=$parsedBody['email'];
        $par->phone=$parsedBody['phone'];
        $par->password=md5("passwordparent");
        $par->save();
        return $response->withJson(new Callback(['parent'=>$par]));
   });

   $app->post('/update/{id}/', function ($request, $response, $args){
    $parsedBody = $request->getParsedBody();
    $par=Studentparent::where('id',$args)->first();
    $par->name=$parsedBody['name'];
    $par->adress=$parsedBody['adress'];
    $par->email=$parsedBody['email'];
    $par->phone=$parsedBody['phone'];
    $par->password=md5("passwordparent");
    $par->save();
    return $response->withJson(new Callback(['parent'=>$par]));
    });


    $app->get('/result/{id}/', function($request, $response){
        $student=$this->auth->getUser();
        $resultviwer=new ResultViwer($student->id);
        $results =$resultviwer->get();
        return $response->withJson(new Callback(['results'=>$results,'student'=>$student]));
    });

    
})->add(new Middleware\AuthMiddleware([0,1,2,3],$app->getContainer()['auth']));