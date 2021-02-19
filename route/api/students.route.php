<?php
use Models\Student;
use Models\Attendance;
use Models\Result;
use Models\Exam;
use Controllers\ResultController;
use Models\Callback;
$app->group('/api/students',function($app){
    $app->get('/all/', function ($request,  $response)  {
        $callback=new Callback(['students'=>Student::all()]);
        return $response->withJson($callback);
        });

    $app->get('/byclassroom/{id}/', function ($request,  $response,$args)  {
        $callback=new Callback(['students'=>Student::where('classroom_id',$args['id'])->get()]);
            return $response->withJson($callback);
        });

        $app->get('/bylevel/{id}/', function ($request,  $response,$args)  {
            $callback = new Callback(['students'=>Student::where('level_id',$args['id'])->get()]);
            return $response->withJson($callback);
        });

        $app->get('/attendance/{id}/{year}/{month}/', function ($request,  $response,$args)  {
            $callback = new Callback(['attendances'=>Attendance::where('student_id',$args['id'])->whereRaw('year(date)='.$args['year'])->whereRaw('month(date)='.$args['month'])->get()]);
            return $response->withJson($callback);
        });

        $app->get('/attendance/{id}/', function ($request,  $response,$args)  {
            $callback = new Callback(['attendances'=>Attendance::where('student_id',$args['id'])->get()]);
            return $response->withJson($callback);
        });

        $app->get('/attendance/{id}/{year}/', function ($request,  $response,$args)  {
            $callback = new Callback(['attendances'=>Attendance::where('student_id',$args['id'])->whereRaw('year(date)='.$args['year'])->get()]);
            return $response->withJson($callback);
        });

        $app->get('/result/{id}/', function ($request,  $response,$args)  {
            $callback = new Callback(['results'=>Result::where('student_id',$args['id'])->get()]);
            return $response->withJson($callback);
        });

        
        $app->get('/api/student/exam/{id}/', function($request, $response, $args) {
            $callback = new Callback(['exams'=>Exam::where('id',$args['id'])->first()]);
            return $response->withJson($callback);
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



// $app->post('/api/student/result/{id}/', function($request, $response, $args){
//     $parsed = $request->getParsedBody();
//     $result = Result::where('student_id',$args['id'])->first();
//     $result= ResultController::where();
// });














