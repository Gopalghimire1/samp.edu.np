<?php

$app->get('/message/', function ($request,  $response) use($Views) {
    echo $Views->make('front.aboutus.messagepri');
    });