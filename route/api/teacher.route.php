<?php
use Models\Teacher;

$app->group('/api/teacher', function($app){
    $app->post('/add/',function($request, $response){
        $parsedBody = $request->getParsedBody();
        $teacher = new Teacher();
        $teacher->name = $parsedBody['name'];
        $teacher->adress = $parsedBody['adress'];
        $teacher->phone = $parsedBody['phone'];
        $teacher->education = $parsedBody['education'];
        $teacher->email = $parsedBody['email'];
        $teacher->description = $parsedBody['description'];
        $teacher->password = md5("passwordteacher");

        $uploadedFile=$request->getUploadedFiles()['photo'];
                $directory="assets/img/teacher";
                $uf=$uploadedFile;
                $filename = $uf->name;   
                $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                $teacher->photo=$directory . DIRECTORY_SEPARATOR . $filename;
        $teacher->save();
        return $response->withJson(new Callback(['teacher'=>$teacher]));
    });

    $app->post('/edit/{id}/', function($request, $response, $args){
        $parsedBody = $request->getParsedBody();
        $teacher = Teacher::where('id', $args)->first();
        $teacher->name = $parsedBody['name'];
        $teacher->adress = $parsedBody['adress'];
        $teacher->phone = $parsedBody['phone'];
        $teacher->education = $parsedBody['education'];
        $teacher->email = $parsedBody['email'];
        $teacher->description = $parsedBody['description'];
        $teacher->password = md5("passwordteacher");

        $uploadedFile=$request->getUploadedFiles()['photo'];
                $directory="assets/img/teacher";
                $uf=$uploadedFile;
                $filename = $uf->name;   
                $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                $teacher->photo=$directory . DIRECTORY_SEPARATOR . $filename;
        $teacher->save();
        return $response->withJson(new Callback(['teacher'=>$teacher]));
    });

})->add(new Middleware\AuthMiddleware([0],$app->getContainer()['auth']));