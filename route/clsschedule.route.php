<?php 
use Models\Classchedule;
use Models\Classroom;
use Models\Teacher;

$app->get('/admin/clsschedule/Manage/{id}/', function($request, $response, $args) use($Views) {
    // print_r(Classroom::where('id',$args)->first());
      echo $Views->make('back.clsschedule.manage',['cls'=>Classroom::where('id',$args)->first(),'teach'=>Teacher::all()]);
});

$app->post('/admin/clsschedule/Manage/{id}/', function($request, $response, $args) use($Views) {
    $parsed = $request->getParsedBody();
    $parsed['classroom_id']=$args['id'];
    $cls = Classchedule::create($parsed);
    echo $Views->make('back.clsschedule.manage');

});

$app->get('/admin/clsschedule/del/{id}/', function($request, $response, $args) use($Views) {
    $cls = Classchedule::where('id', $args)->first();
    $cls->delete();
    return $response->withRedirect('/admin/clsschedule/list/');
});

