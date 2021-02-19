<?php
use Models\Academiccalendar;

$app->get('/admin/academic/add/', function ($request,  $response) use($Views) {
        echo $Views->make('back.academic.add');
    });

$app->post('/admin/academic/add/', function ($request,  $response) use($Views) {
        $parsed = $request->getParsedBody();
        $academic = Academiccalendar::create($parsed);
        return $response->withRedirect('/admin/academic/list/');
    });

$app->get('/admin/academic/list/', function ($request,  $response) use($Views) {
        echo $Views->make('back.academic.list',['academics'=>Academiccalendar::all()]);
    });

 $app->get('/admin/academic/edit/{id}/', function ($request,  $response, $args) use($Views) {
        echo $Views->make('back.academic.edit',['academic'=>Academiccalendar::where('id',$args)->first()]);
    }); 
    
$app->post('/admin/academic/edit/{id}/', function ($request,  $response, $args) use($Views) {
       $parsed = $request->getParsedBody();
       $academic = Academiccalendar::where('id',$args)->first();
       $academic->update($parsed);
       return $response->withRedirect('/admin/academic/list/');
    });

$app->get('/admin/academic/del/{id}/', function ($request,  $response, $args) use($Views) {
       $academic = Academiccalendar::where('id',$args)->first();
       $academic->delete();
       return $response->withRedirect('/admin/academic/list/');       
    });
