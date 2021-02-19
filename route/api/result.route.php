<?php
use Models\Result;

$app->group('/result', function($app){
      $app->post('/add/', function($request, $response){
            $parsed = $request->getParsedBody();
            $result = Result::create($parsed);
            return $response->withJson(new Callback(['result'=>$result]));
      });

      $app->post('/edit/', function($request, $response, $args){
        $parsed = $request->getParsedBody();
        $result = Result::where('id',$args)->first();
        $result->update($parsed);    
        return $response->withJson(new Callback(['result'=>$result]));
  });
})->add(new Middleware\AuthMiddleware([0,1],$app->getContainer()['auth']));