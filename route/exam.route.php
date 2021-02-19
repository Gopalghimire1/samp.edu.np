<?php
use Models\Exam;
use Models\Examclass;
use Models\Level;
use Models\Callback;
use Models\Examsubject;
use Controllers\ResultController;

$app->get('/admin/exam/list/', function ($request, $response) use($Views) {
    echo $Views->make('back.exam.list',['exams'=>Exam::all()]);
});

$app->post('/admin/exam/add/', function ($request, $response) use($Views) {
    $parsedBody = $request->getParsedBody();
    $exam = Exam::create($parsedBody);
    return $response->withRedirect("/admin/exam/list/");
});
$app->get('/admin/exam/edit/{id}/', function ($request, $response ,$args) use($Views) {
    $exam =Exam::where('id',$args)->first();
    echo $Views->make('back.exam.edit',['exam'=>$exam]);
    
});
$app->post('/admin/exam/edit/{id}/', function ($request, $response ,$args) use($Views) {
    $parsedBody = $request->getParsedBody();
    $exam =Exam::where('id',$args)->first();
    $exam->update($parsedBody);
    return $response->withRedirect("/admin/exam/list/");
});
$app->get('/admin/exam/del/{id}/', function ($request, $response ,$args) use($Views) {
    $exam =Exam::where('id',$args)->first();
    $exam->delete();
    return $response->withRedirect("/admin/exam/list/");
});

$app->get('/admin/exam/manage/{id}/', function ($request, $response ,$args) use($Views) {
    $exam =Exam::where('id',$args)->first();
    echo $Views->make('back.exam.manage',['exam'=>$exam,'levels'=>Level::all()]);
});


$app->post('/admin/exam/level/add/{id}/', function ($request, $response, $args) use($Views) {
    $parsedBody = $request->getParsedBody();
    $callback = new Callback();
    $count=Examclass::where(['level_id'=>$parsedBody['level_id'],'exam_id'=>$args['id']])->count();
    if($count<1){
        $exlevel = new Examclass();
        $exlevel->exam_id = $args['id'];        
        $exlevel->level_id=$parsedBody['level_id'];
        $exlevel->save();
    }
    else{
        
    }
    return $response->withRedirect("/admin/exam/manage/".$args['id']."/");
   
});

$app->post('/admin/examclass/subject/add/{id}/', function ($request, $response,$args) use($Views) {
     $parsedBody = $request->getParsedBody();
     $parsedBody['examclass_id']=$args['id'];
     $sub=Examsubject::create($parsedBody);
     $class=Examclass::where('id',$args['id'])->first();
     return $response->withRedirect("/admin/exam/manage/".$class->exam_id."/");
});


$app->get('/admin/examsubject/edit/{id}/', function($request, $response, $args) use($Views){
    echo $Views->make('back.exam.examedit',['examsubject'=>Examsubject::where('id',$args)->first()]);

});

$app->get('/admin/examsubject/del/{id}/', function($request, $response, $args) use($Views){
       $sub = Examsubject::where('id',$args)->first();
       $class=$sub->examclass();
       $sub->delete();
       return $response->withRedirect("/admin/exam/manage/".$class->level_id."/");

});

$app->post('/admin/examsubject/edit/{id}/', function($request, $response, $args) use($Views){
    $parsedBody = $request->getParsedBody();
    $sub = Examsubject::where('id',$args['id'])->first();
    $class=Examclass::where('id',$sub->examclass_id)->first();
    $sub->name = $parsedBody['name'];
    $sub->fullmarks = $parsedBody['fullmarks'];
    $sub->passmarks = $parsedBody['passmarks'];
    $sub->save();
    return $response->withRedirect('/admin/exam/manage/'.$class->exam_id."/");
});


$app->get('/admin/examsubject/marks/{id}/', function($request, $response, $args) use($Views){
    $marks=new ResultController();
    $marks->loaddata($args['id']);
    // print_r($marks);
    echo $Views->make('back.exam.marks',['marks'=>$marks ]);
});
   
$app->post('/admin/examsubject/marks/{id}/', function($request, $response, $args) use($Views){
    $parsedBody=$request->getParsedBody();
    $marks=new ResultController();
    $marks->loaddata($args['id']);
    foreach ($parsedBody as $key => $value) {
        if(stripos($key,'mark-') !== false){
            // echo "student id= ".substr($key,5-strlen($key)).'<hr>';
            $marks->set(intval(substr($key,5-strlen($key))),$value);
            // echo $key.",".$value.'<hr>';
        }   
    }
    $marks1=new ResultController();
    $marks1->loaddata($args['id']);
    echo $Views->make('back.exam.marks',['marks'=>$marks1]);
});
   
   
   
   
   
   