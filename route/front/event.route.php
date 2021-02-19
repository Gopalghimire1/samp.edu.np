<?php
use Models\Event;
$app->get('/events/', function ($request,  $response) use($Views) {
    echo $Views->make('front.events.list',['events'=>Event::all()]);
    });