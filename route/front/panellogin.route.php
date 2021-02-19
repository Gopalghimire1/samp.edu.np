<?php 
use Models\Student;
use Models\Studentparent;
use Models\Teacher;

$app->get('/login/',function($request, $response) use($Views){
        echo $Views->make('front.login.login');
});

$app->post("/panel/login/",function($request, $response) {
    $parsed = $request->getParsedBody();
    $pass = md5($parsed['password']);
    $email=$parsed['email'];
    $role=3;
    if($this->auth->login($role,$email,$pass)){
       if($role==1){
         return $response->withRedirect('/teacherpanel/');
       }else if($role==2){
          return $response->withRedirect('/parent/');
       }else if($role==3){
          
          return $response->withRedirect('/student/');
       }
    }else{
          return $response->withRedirect('/login/');
    }
});
