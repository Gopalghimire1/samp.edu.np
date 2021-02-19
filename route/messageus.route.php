<?php
use Models\Contact;
$app->get('/admin/messages/', function ($request,  $response) use($Views) {
    echo $Views->make('back.messageus.message',['contacts'=>Contact::all()]);
    });