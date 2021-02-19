<?php

use Models\Event;

$app->get('/admin/event/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.event.add');
});


$app->post('/admin/event/add/', function ($request,  $response) use ($Views) {
    $parsedBody = $request->getParsedBody();
    $event = new Event();
    $event->title = $parsedBody['title'];
    $event->description = $parsedBody['description'];
    $event->eventtime = $parsedBody['eventtime'];
    $event->eventdate = $parsedBody['eventdate'];
    $event->adress = $parsedBody['adress'];

    $uploadedFile = $request->getUploadedFiles()['photo'];
    $directory = "assets/img/event";
    $uf = $uploadedFile;
    $filename = $uf->name;
    $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
    $event->photo = $directory . DIRECTORY_SEPARATOR . $filename;
    $event->save();

    return $response->withRedirect('/admin/event/list/');
});


$app->get('/admin/event/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.event.list', ['events' => Event::all()]);
});


$app->get('/admin/event/edit/{id}/', function ($request,  $response, $args) use ($Views) {
    echo $Views->make('back.event.edit', ['event' => Event::where('id', $args)->first()]);
});

$app->post('/admin/event/edit/{id}/', function ($request,  $response, $args) use ($Views) {
    $parsedBody = $request->getParsedBody();
    $event = Event::where('id', $args)->first();
    $event->title = $parsedBody['title'];
    $event->description = $parsedBody['description'];
    $event->eventtime = $parsedBody['eventtime'];
    $event->eventdate = $parsedBody['eventdate'];
    $event->adress = $parsedBody['adress'];

    if (isset($request->getUploadedFiles()['photo'])) {
        $uploadedFile = $request->getUploadedFiles()['photo'];
        $directory = "assets/img/event";
        $uf = $uploadedFile;
        $filename = $uf->name;
        if ($filename != "") {
            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
            $event->photo = $directory . DIRECTORY_SEPARATOR . $filename;
        }
    }
    $event->save();
    return $response->withRedirect('/admin/event/list/');
});

$app->get('/admin/event/del/{id}/', function ($request,  $response, $args) use ($Views) {
    $event = Event::where('id', $args)->first();
    $event->delete();
    return $response->withRedirect('/admin/event/list/');
});
