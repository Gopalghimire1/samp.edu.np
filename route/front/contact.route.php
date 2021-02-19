<?php
use Models\Contact;
$app->get('/contact/', function ($request,  $response) use($Views) {
    echo $Views->make('front.aboutus.contact');
    });

$app->post('/contactus/', function($request, $response) use($Views){
    $parsed = $request->getParsedBody();
    $contact = Contact::create($parsed);
    return $response->withRedirect('/');
});