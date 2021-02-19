<?php
use Models\Studentparent;
use Models\Callback;
$app->post('/admin/parent/add/', function ($request, $response) {
    $parsedBody = $request->getParsedBody();
    $par=new Studentparent();
    $par->name=$parsedBody['name'];
    $par->adress=$parsedBody['adress'];
    $par->email=$parsedBody['email'];
    $par->phone=$parsedBody['phone'];
    $par->password=md5("passwordparent");
    $par->save();
    
    // $callback=new Callback();
    // $callback->ok();
    // $callback->loaddata($par->id);
    return $response->withJson($par);
    });

$app->post('/admin/parent/search/', function ($request, $response) {
    $parsedBody = $request->getParsedBody();
    $searchtype=$parsedBody['type'];
    $value=$parsedBody['value'];
    $para=['name','adress','phone'];
    $pars=Studentparent::where($para[$searchtype],'like','%'.$value.'%')->get();;
    return $response->withJson($pars);
});