<?php
use Models\Admission;

$app->get('/admission/', function ($request,  $response) use($Views) {
    echo $Views->make('front.admission.admission');
    });

    $app->post('/admission/', function ($request,  $response) {
        $parsed = $request->getParsedBody();
        $adm = Admission::create($parsed);
        $_SESSION['message'] = "Your Request Sent Successfully";
        return $response->withRedirect('/admission/');
        });