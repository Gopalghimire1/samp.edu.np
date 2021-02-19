<?php
use Models\Rresult;
use Models\Download;

$app->get('/result/page/', function ($request,  $response) use($Views) {
    echo $Views->make('front.fees.list');
    });

    $app->get('/result/{type}', function ($request,  $response, $type) {
          $result = Rresult::where('examtype',$type)->orderBy('id','desc')->get();
          return $response->withJson($result);
        });


        $app->get('/download/', function ($request,  $response) use($Views) {
          $d = Download::orderBy('id','desc')->get();
          echo $Views->make('front.download.list',['download'=>$d]);
          });