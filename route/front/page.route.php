<?php
use Models\Page;
$app->get('/feature/{id}/',function($request,$response,$vars) use($Views) {
    $page=Page::find($vars['id']);
    echo $Views->make('front.page.show',['page'=>$page]);
});

$app->get('/course/{id}/',function($request,$response,$vars) use($Views) {
    $page=Page::find($vars['id']);
    echo $Views->make('front.page.show',['page'=>$page]);
});

$app->get('/message/{id}/',function($request,$response,$vars) use($Views) {
    $page=Page::find($vars['id']);
    echo $Views->make('front.aboutus.messagepri',['page'=>$page]);
});