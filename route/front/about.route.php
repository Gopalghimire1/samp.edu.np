<?php

use Models\Studentlist;
use Models\ExcelReader;
$app->get('/aboutus/', function ($request,  $response) use ($Views) {
    echo $Views->make('front.aboutus.about');
});

$app->get('/students/', function ($request,  $response) use ($Views) {
    $list = Studentlist::all();
    echo $Views->make('front.aboutus.studnet', ['students' => $list]);
});

$app->get('/students/{id}/', function ($request,  $response,$vars) use ($Views) {
    $file = Studentlist::find($vars['id']);
    $xlsx = ExcelReader::parse($file->file);
    echo $Views->make('front.aboutus.studentlist', ['xlsx' => $xlsx,'title'=>$file->title]);
});
