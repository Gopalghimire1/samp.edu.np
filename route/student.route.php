<?php
use Models\Student;
use Models\Level;
use Models\Classroom;


$app->get('/admin/student/add/', function ($request, $response) use($Views) {
    echo $Views->make('back.student.add',['levels'=>Level::all(),'classrooms'=>Classroom::all()]);
    });

$app->post('/admin/student/add/', function ($request, $response) use($Views) {
    $parsedBody = $request->getParsedBody();
    $student=Student::create($parsedBody);
    $student->password=md5("passwordstudent");
    $student->save();
    return $response->withRedirect('/admin/student/list/');  
});

    $app->get('/admin/student/list/', function ($request, $response) use($Views) {
        echo $Views->make('back.student.list',['students'=>Student::where('isarchived',0)->get()]);
        });
$app->get('/admin/student/edit/{id}/', function ( $request,  $response,$args) use($Views) {
    echo $Views->make('back.student.edit',['student'=>Student::where('id',$args)->first(),'levels'=>Level::all(),'classrooms'=>Classroom::all()]);
});

$app->post('/admin/student/edit/{id}/', function ( $request,  $response,$args) use($Views) {
    $student=Student::where('id',$args)->first();
    $parsedBody = $request->getParsedBody();
    $student->update($parsedBody);
    return $response->withRedirect('/admin/student/list/');  

    
});

$app->get('/admin/student/del/{id}/', function ( $request,  $response,$args) use($Views) {
    $student=Student::where('id',$args)->first();
    $student->delete();
    return $response->withRedirect('/admin/student/list/');  
});

