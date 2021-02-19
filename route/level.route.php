<?php
use Models\Level;
use Models\Classroom;
use Models\Student;

$app->get('/admin/level/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.level.add');
    });

    $app->get('/admin/level/list/', function ($request,  $response) use($Views) {
        echo $Views->make('back.level.list',['levels'=>Level::all()]);
        });

$app->post('/admin/level/add/', function ( $request, $response) use($Views) {
    $parsedBody = $request->getParsedBody();
    $level = Level::create($parsedBody);
    return $response->withRedirect("/admin/level/list/");
    });

$app->get('/admin/level/edit/{id}/', function ($request,  $response,$args) use($Views) {
    echo $Views->make('back.level.edit',['level'=>Level::where(id,$args)->first()]);
});

$app->post('/admin/level/edit/{id}/', function ($request,  $response,$args) use($Views) {
    $level=Level::where('id',$args)->first();
    $level->name=$request->getParsedBody()['name'];
    $level->save();
    return $response->withRedirect("/admin/level/list/");
});

$app->get('/admin/level/del/{id}/', function ($request,  $response,$args) use($Views) {
    $level=Level::where('id',$args)->first();

    $level->delete();
    return $response->withRedirect("/admin/level/list/");
});

// $app->post('/admin/level/classrooms/', function ($request,  $response,$args) use($Views) {
//     $parsedBody=$request->getParsedBody();
//     print_r($parsedBody);
//     // $level=Level::where('id',$parsedBody['level_id'])->first();
//     // $classrooms=Classroom::where('level_id',$level->id)->get();
//     // $callback=new Callback();
//     // $class=[];
//     // foreach ($classrooms as $classroom) {
//     //     $c['id']=$classroom->id;
//     //     $c['section']=$classroom->section;
//     //     $c['level']=$level->name;
//     //     array_push($class,$c);
//     // }
//     // $callback->ok();
//     // $callback->loaddata($class);
//     // return $response->withJson($callback);
// });

$app->get('/admin/level/manage/{id}/', function ($request,  $response, $args) use($Views) {
    echo $Views->make('back.level.managestudent',['students'=>Student::where('level_id',$args)->get(),'levels'=>Level::all(),'currentlevel'=>$args['id']]);
});

$app->post('/admin/level/manage/{id}/', function ($request,  $response, $args) use($Views) {
    $parsedBody = $request->getParsedBody();
    // print_r($parsedBody);
    foreach($parsedBody as $key => $value){
        if(stripos($key,'check-')!==false){
           $studentid= substr($key,6);
        //    echo $studentid."|";
           $std= Student::where('id',$studentid)->first();
           if(isset($parsedBody['roll-'.$studentid])){
               $std->roll=$parsedBody['roll-'.$studentid];
           }
           if(isset($parsedBody['changeclass'])){
                $std->level_id=$parsedBody['newlevel'];
           }
           $std->save();
        }
    }
 return $response->withRedirect('/admin/level/list/');
});
