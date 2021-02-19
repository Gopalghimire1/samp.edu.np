<?php
use Models\News;
use Models\Event;
use Models\Notice;
use Models\Level;
use Models\Student;
use Models\Fee;
use Models\Slider;
use Models\Teacher;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Models\Rresult;

session_start();
require 'bootstrap.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
    ],
  ];
$app = new \Slim\App($config);
$app->add(function ($request, $response, $next) {
  $routename=$request->getUri()->getPath();
  if(str_contains($routename,"admin")){
      if(isset($_SESSION['admin']) ){
        if($_SESSION['auth']['role']==0){
          $response = $next($request, $response);
          return $response;
        }else{
          if(str_contains($routename,"login")){
            $response = $next($request, $response);
            return $response;
          }else{
  
            return $response->withRedirect("/admin/login/");
          }
        }
        
      }else{
        if(str_contains($routename,"login")){
          $response = $next($request, $response);
          return $response;
        }else{

          return $response->withRedirect("/admin/login/");
        }
      }
  }else{
    $response = $next($request, $response);
    return $response;
  }
 
});

$container = $app->getContainer();


// Register provider
$container['auth'] = function () {
    return new \Controllers\AuthManager();
};
$container['firebase']=function(){
  $serviceAccount = ServiceAccount::fromJsonFile('azukation-d6b18-0a2cf22e1883.json');
  $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->create();
  return $firebase;
};

$container=$app->getContainer();
$container['key']=$key;
$app->get('/', function (Request $request, Response $response) use($Views) {
  echo $Views->make('front.landing.landingpage2',['news'=>News::orderBy('id','desc')->take(10)->get(),'notices'=>Notice::orderBy('id','desc')->take(6)->get(),'sliders'=>Slider::all(),'teachers'=>Teacher::all()]);
  });

  $app->get('/admin/', function (Request $request, Response $response) use($Views) {
    $std = Student::all();
    $totalstudent = count($std);
    $teach = Teacher::all();
    $totalteacher = count($teach);

    echo $Views->make('back.index',['totalstd'=>$totalstudent,'totalteach'=>$totalteacher]);
    });

    $app->get('/result/detail/{id}/', function ($request,  $response,$id) use ($Views) {
      $result = Rresult::where('id',$id)->first();
      echo $Views->make('front.result.single',['result'=>$result]);
  });

// frontend
require('route/front/event.route.php');
require('route/front/page.route.php');
require('route/front/teacherpanel.route.php');
require('route/front/notice.route.php');
require('route/front/teacher.route.php');
require('route/front/fee.route.php');
require('route/front/about.route.php');
require('route/front/contact.route.php');
require('route/front/parent.route.php');
require('route/front/panellogin.route.php');
require('route/front/student.route.php');
require('route/front/messagepri.route.php');
require('route/front/admission.route.php');

// backend 
require('route/student.route.php');
require('route/level.route.php');
require('route/parent.route.php');
require('route/classroom.route.php');
require('route/teacher.route.php');
require('route/event.route.php');
require('route/news.route.php');
require('route/galary.route.php');
require('route/exam.route.php');
require('route/notice.route.php');
require('route/result.route.php');
require('route/note.route.php');
require('route/attendance.route.php');
require('route/academic.route.php');
require('route/messageus.route.php');
require('route/admin.route.php');
require('route/bill.php');
require('route/slider.route.php');
require('route/receit.route.php');
require('route/clsschedule.route.php');
require('route/mocktest.route.php');
require('route/download.php');
require('route/stdlist.php');
require('route/page.route.php');


//api
require('route/api/students.route.php');
require('route/api/attendance.route.php');
require('route/api/login.php');
require('route/api/student.route.php');
require('route/api/result.route.php');
require('route/api/exam.route.php');
require('route/api/teacher.route.php');

$app->run();


