<?php

use Models\Studentlist;

$app->get('/admin/stdlist/', function ($request,  $response) use ($Views) {
  $d = Studentlist::orderBy('id', 'desc')->get();
  echo $Views->make('back.studentlist.list', ['studentlist' => $d]);
});

$app->get('/admin/stdlist/add/', function ($request,  $response) use ($Views) {
  echo $Views->make('back.studentlist.create');
});


$app->post('/admin/stdlist/add/', function ($request,  $response) use ($Views) {
  $parse = $request->getParsedBody();
  $d = new Studentlist();
  $d->title = $parse['title'];
  $uploadedFile = $request->getUploadedFiles()['file'];
  $directory = "assets/img/list";
  $uf = $uploadedFile;
  $filename = $uf->name;
  $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
  $d->file = $directory . DIRECTORY_SEPARATOR . $filename;
  $d->save();
  return $response->withRedirect('/admin/stdlist/');
});





$app->get('/admin/stdlist/del/{id}/', function ($request,  $response, $id) {
  $list = Studentlist::where('id', $id)->first();
  $list->delete();
  return $response->withRedirect('/admin/stdlist/');
});
