<?php
use Models\Student;
use Models\Attendance;
use Models\Result;
use Models\Exam;
use Controllers\ResultController;
use Models\Callback;
use \Controllers\ResultViwer;
$app->group("/api/student",function($app){
    $app->get('/{id}/', function ($request, $response, $args){
         return $response->withJson(new Callback(['student'=>Student::where('id',$args)->first()]));
    });

    $app->post('/add/',function ($request, $response){
         $parsed = $request->getParsedBody();
         $student=Student::create($parsedBody);
         $student->password=md5("passwordstudent");
         $student->save();
         return $response->withJson(new Callback(['student'=>$student]));
    });

    $app->post('/edit/{id}/', function($request, $response, $args){
        $parsed = $request->getParsedBody();
        $student= Student::where('id',$args)->first();
        $student->update($parsed);
        $student->save();
        return $response->withJson(new Callback(['student'=>$student]));
    });

    $app->get('/result/{id}/', function($request, $response){
        $student=$this->auth->getUser();
        $resultviwer=new ResultViwer($student->id);
        $results =$resultviwer->get();
        return $response->withJson(new Callback(['results'=>$results,'student'=>$student]));
    });

    



})->add(new Middleware\AuthMiddleware([0,1,2,3],$app->getContainer()['auth']));
// })->add(function($request,$response,$next){
//     $session_key= $request->getHeader('session_key');
//         if($session_key==null){
//                 $callback=new Callback();
//                 $callback->notok(error_1x8);
//                 return $response->withJson($callback);
//         }
//         if($this->auth->loadAuth($session_key)){
//                 return $next($request,$response);
//         }else{
//             $callback=new Callback();
//             $callback->notok(error_1x2);
//             $callback->loaddata(['session_key',$session_key]);
//             return $response->withJson($callback);
//         }

// });
