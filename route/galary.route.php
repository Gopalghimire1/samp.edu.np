<?php
use Models\Galary;
use Models\Photo;
use Models\Callback;
$app->get('/admin/galary/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.galary.add');
    });
$app->get('/admin/galary/list/', function ($request,  $response) use($Views) {
    echo $Views->make('back.galary.list',['galaries'=>Galary::all()]);
});

$app->get('/admin/galary/del/{id}/', function ($request,  $response,$args)  {
       
       $galary = Galary::find($args['id']);
       $galary->delete();
       return $response->withRedirect('/admin/galary/list/'); 
});

$app->post('/admin/galary/add/', function ($request,  $response) use($Views) {
       $parsedBody = $request->getParsedBody();
       $galary = Galary::create($parsedBody);
       return $response->withRedirect('/admin/galary/list/'); 
});

    


$app->get('/admin/galary/manage/{id}/', function ($request,  $response,$args) use($Views) {
    echo $Views->make('back.galary.manage',['images'=>Photo::where('galary_id',$args['id'])->get(),'galary'=>Galary::where('id',$args)->first()]);
});

$app->post('/admin/galary/addphotos/{id}/', function ($request,  $response,$args) use($Views) {
    $galary_id=$args['id'];
    $files=$request->getUploadedFiles()['files'];
    $directory="assets/img/galary";
    foreach ($files as $file ) {

        $uf=$file;
        $filename = $uf->name;   
        $uf->moveTo($directory . '/' . $filename);       
        $photo=new Photo();
        $photo->galary_id=$galary_id;
        $photo->filepath=$directory . '/' . $filename;
        $photo->save();
    } 
    return $response->withRedirect('/admin/galary/manage/'.$galary_id.'/'); 

    
});

$app->post('/admin/galary/delPhoto/{id}/', function ($request,  $response,$args) use($Views) {
    $parsedBody=$request->getParsedBody();
    $images=$parsedBody['images'];
    $imagesarray=explode(",",$images);
    $callback=new Callback();
    $deleted=[];
    foreach ($imagesarray as $image) {
        $photo=Photo::where('id',$image)->first();
        $photo->delete();
        array_push($deleted,$image);
    }
    $callback->ok();
    $callback->loaddata($deleted);
    return $response->withJson($callback);
});





