<?php
use Models\Callback;
$app->post("/api/login/",function($request, $response) {
    $callback=new Callback([]);
    $parsed = $request->getParsedBody();
    $pass = md5($parsed['password']);
    $email=$parsed['email'];
    $role=$parsed['role'];
    if($this->auth->login($role,$email,$pass)){
        $callback->loaddata(['auth'=>$this->auth->getAuth()]);
    }else{
        $callback->notok(error_1x1);
    }
    return $response->withJson($callback);
});

$app->group("/api",function($app){
    $app->get("/user/",function($request, $response){
        $callback=new Callback(['user'=>$this->auth->getUser()]);
        return $response->withJson($callback);
        // print_r($this->auth);
        // print_r($this->auth->getUser());
    });
})->add(new Middleware\AuthMiddleware([],$app->getContainer()['auth']));