<?php
use Models\Attendance;
use Controllers\AttendanceManager;
use Models\Callback;
$app->group("/api/attendance",function($app){

    $app->get('/{date}/{classroom_id}/', function ($request,  $response,$args) {
        $callback=new Callback();
        $callback->ok();
        $callback->loaddata(["attendences"=>Attendance::where('date',$args['date'])->where('classroom_id',$args['classroom_id'])->get()]);
        return $response->withJson($callback);
    });
    $app->post('/{date}/{classroom_id}/', function ($request,  $response,$args)  {
        $data =$request->getParsedBody();
        $attendancemanager=new AttendanceManager();
        $attendancemanager->loadData($args['date'],$args['classroom_id']);
        $attendances=[];
        array_push($attendances,$data);
        foreach ($data as $key => $att) {
           array_push($attendances,$attendancemanager->set(intval(substr($key,4-strlen($key))),$att));
        }
        $callback=new Callback();
        $callback->ok();
        $callback->loaddata(["attendences"=>$attendances]);
        return $response->withJson($callback);
    });
})->add( new Middleware\AuthMiddleware([0,1,2],$app->getContainer()['auth']));
// })->add(function($request,$response,$next){
//     $session_key= $request->getHeader('session_key');
//         if($session_key==null){
//                 $callback=new Callback();
//                 $callback->notok(error_1x8);
//                 return $response->withJson($callback);
//         }
//     if($this->auth->loadAuth($session_key)){
//         if($this->auth->role(teacher) && $this->auth->role(studentparent) && $this->auth->role(admin)){
//             return $next($request,$response);
//         }else{
//             $callback=new Callback();
//             $callback->notok(error_1x7);
//             $callback->loaddata(['session_key',$session_key]);
//             return $response->withJson($callback);
//         }
//     }else{
//         $callback=new Callback();
//         $callback->notok(error_1x2);
//         $callback->loaddata(['session_key',$session_key]);
//         return $response->withJson($callback);
//     }
// });
