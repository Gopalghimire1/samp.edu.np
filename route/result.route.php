<?php

use Models\Rresult;
use Models\Admission;
use Models\Openadmission;
use Models\Studentinbox;
$app->get('/admin/result/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.result.add');
});

$app->post('/admin/result/add/', function ($request,  $response) use ($Views) {
    $parse = $request->getParsedBody();
    $result = new Rresult();
    $result->title = $parse['title'];
    $result->publisher = $parse['publisher'];
    $result->date = $parse['date'];
    $result->examtype = 0;

    $uploadedFile = $request->getUploadedFiles()['file'];
    $directory = "assets/img/result";
    $uf = $uploadedFile;
    $filename = $uf->name;
    $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
    $result->file = $directory . DIRECTORY_SEPARATOR . $filename;
    $result->save();
    return $response->withRedirect('/admin/result/list/');
});

$app->get('/admin/result/list/', function ($request,  $response) use ($Views) {
    $result = Rresult::orderBy('id', 'desc')->get();
    echo $Views->make('back.result.list', ['results' => $result]);
});


$app->get('/admin/result/edit/{id}/', function ($request,  $response, $args) use ($Views) {
    $result = Rresult::where('id', $args)->first();
    echo $Views->make('back.result.edit', ['result' => $result]);
});


$app->post('/admin/result/edit/{id}/', function ($request,  $response, $args) use ($Views) {
    $parse = $request->getParsedBody();
    $result = Rresult::where('id', $args)->first();
    $result->title = $parse['title'];
    $result->publisher = $parse['publisher'];
    $result->date = $parse['date'];
    $result->examtype = $parse['examtype'];

    if (isset($request->getUploadedFiles()['file'])) {
        $uploadedFile = $request->getUploadedFiles()['file'];
        $directory = "assets/img/result";
        $uf = $uploadedFile;
        $filename = $uf->name;
        if ($filename != "") {
            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
            $result->file = $directory . DIRECTORY_SEPARATOR . $filename;
        }
    }


    $result->save();
    return $response->withRedirect('/admin/result/list/');
});


$app->get('/admin/result/del/{id}/', function ($request,  $response, $args) use ($Views) {
    $result = Rresult::where('id', $args)->first();
    $result->delete();
    return $response->withRedirect('/admin/result/list/');
});




// admission Request list

$app->get('/admin/admission/', function ($request,  $response, $args) use ($Views) {
    $list = Admission::orderBy('id', 'desc')->get();
    echo $Views->make('back.admission.list', ['list' => $list]);

  
});

$app->get('/admin/admission/selective/{id}/', function ($request,  $response, $args) use ($Views) {
    $list = Admission::where('openadmission_id',$args['id'])->orderBy('id', 'desc')->get();
    $opad = Openadmission::find($args['id']);
    echo $Views->make('back.admission.selective', ['list' => $list,'opad'=>$opad]);
});

$app->get('/admin/admission/selective/{id}/status/{stat}/', function ($request,  $response, $args) use ($Views) {
    $list = Admission::where('openadmission_id',$args['id'])->where('status',$args['stat'])->orderBy('id', 'desc')->get();
    $opad = Openadmission::find($args['id']);
    echo $Views->make('back.admission.selective', ['list' => $list,'opad'=>$opad,'status'=>$args['stat']]);
});

$app->get('/admin/admission/detail/{id}/', function ($request,  $response, $args) use ($Views) {
    $id=$args['id'];
   
    $list = Admission::find($id);
    $old=Admission::where('openadmission_id',$list->openadmission_id)->where('id','<',$list->id)->count();
    $new=Admission::where('openadmission_id',$list->openadmission_id)->where('id','>',$list->id)->count();
    $prev=-1;
    $next=-1;
    if($old>0){
        $prev=Admission::where('openadmission_id',$list->openadmission_id)->where('id','<',$list->id)->orderBy('id', 'DESC')->first()->id;
    }
    if($new>0){
        $next=Admission::where('openadmission_id',$list->openadmission_id)->where('id','>',$list->id)->first()->id;

    }
    echo $Views->make('back.admission.detail', ['ad' => $list,'student'=>$list->student,'old'=>$old,'new'=>$new,'prev'=>$prev,'next'=>$next]);
});

$app->get('/admin/admission/details/{id}/', function ($request,  $response, $args) use ($Views) {
    $id=$args['id'];
   
   
    $list=Admission::where('openadmission_id',$id)->get();
   
    // print($list);
    echo $Views->make('back.admission.all', ['ads' => $list]);
});

$app->post('/admission/accept/',function ($request,  $response, $args) use ($Views) {
    $data=$request->getParsedBody();
   
    $admission = Admission::find($data['id']);
    Studentinbox::create(['student_id'=>$admission->student_id,'message'=>"You application for ".$admission->title." Has been accepted",'hasread'=>0,'type'=>1]);
    $admission->status=1;
    $admission->save();

    return $response->withRedirect('/admin/admission/detail/'.$data['id'].'/');
});

$app->post('/admission/reject/',function ($request,  $response, $args) use ($Views) {
    $data=$request->getParsedBody();
    $admission = Admission::find($data['id']);
      Studentinbox::create(['student_id'=>$admission->student_id,'message'=>"You application for ".$admission->title." Has been Rejected, Please Check you detail and documents.",'hasread'=>0,'type'=>0]);
    $admission->status=1;
    $admission->save();
    return $response->withRedirect('/admin/admission/detail/'.$data['id'].'/');
});