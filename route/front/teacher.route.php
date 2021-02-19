<?php

use Models\Teacher;
use \Controllers\ResultViwer;

$app->get('/teacher/', function ($request,  $response) use ($Views) {
    echo $Views->make('front.teachers.list', ['teachers' => Teacher::all()]);
});

$app->get('/faculty/{id}/', function ($request,  $response,$vars) use ($Views) {
    $faculty=\Models\Faculty::find($vars['id']);
    echo $Views->make('front.teachers.list', ['teachers' => Teacher::where('faculty_id',$faculty->id)->get(),'faculty'=>$faculty]);
});

$app->group("/teachers", function ($app) use ($Views) {
    $app->get('/', function ($request,  $response) use ($Views) {
        echo $Views->make('teacherpanel.dashboard', ['teacher' => $this->auth->getUser()]);
    });
    $app->get('/result/', function ($request,  $response) use ($Views) {
        $student = $this->auth->getUser();
        $resultviwer = new ResultViwer($student->id);
        $results = $resultviwer->get();
        echo $Views->make('teacherpanel.result', ['results' => $results, 'student' => $student]);
    });
})->add(function ($request, $response, $next) {
    if ($this->auth->isLoged()) {
        if ($this->auth->role(teacher)) {
            return $next($request, $response);
        }
    }
    return $response->withRedirect("/");
});

$app->get('/teacher/logout/', function ($request,  $response) use ($Views) {
    unset($_SESSION['auth']);
    return $response->withRedirect('/');
});

$app->get('/teacher/single/{id}/', function ($request,  $response, $args) use ($Views) {
    echo $Views->make('front.teachers.single', ['teacher' => Teacher::where('id', $args)->first()]);
});
