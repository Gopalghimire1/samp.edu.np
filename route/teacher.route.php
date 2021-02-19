<?php
use Models\Teacher;

$app->get('/admin/teacher/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.teacher.add');
    });


$app->post('/admin/teacher/add/', function ($request,  $response) use($Views) {
    $parsedBody = $request->getParsedBody();
    $teacher = new Teacher();
    $teacher->name = $parsedBody['name'];
    $teacher->adress = "";
    $teacher->phone = $parsedBody['phone'];
    $teacher->education = $parsedBody['education'];
    $teacher->email = "";
    $teacher->description = "";
    $teacher->faculty_id = $parsedBody['faculty_id'];
    $teacher->password = md5("passwordteacher");

    $uploadedFile=$request->getUploadedFiles()['photo'];
            $directory="assets/img/teacher";
            $uf=$uploadedFile;
            $filename = $uf->name;   
            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
            $teacher->photo=$directory . DIRECTORY_SEPARATOR . $filename;
    $teacher->save();


    return $response->withRedirect('/admin/teacher/list/');
    });

    $app->get('/admin/teacher/list/', function ($request,  $response) use($Views) {
        echo $Views->make('back.teacher.list',['teachers'=>Teacher::all()]);
        });

    $app->get('/admin/teacher/edit/{id}/', function ($request,  $response, $args) use($Views) {
        echo $Views->make('back.teacher.edit',['teacher'=>Teacher::where('id',$args)->first()]);
        });

        $app->post('/admin/teacher/edit/{id}/', function ($request,  $response, $args) use($Views) {
            $parsedBody = $request->getParsedBody();
            $teacher = Teacher::where('id',$args)->first();
            $teacher->name = $parsedBody['name'];
            $teacher->adress = "";
            $teacher->phone = $parsedBody['phone'];
            $teacher->education = $parsedBody['education'];
            $teacher->email = "";
            $teacher->description = "";
        $teacher->faculty_id = $parsedBody['faculty_id'];

            if(isset($request->getUploadedFiles()['photo'])){
            $uploadedFile=$request->getUploadedFiles()['photo'];
                    $directory="assets/img/teacher";
                    $uf=$uploadedFile;
                    $filename = $uf->name; 
                    if($filename!=""){  
                    $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                    $teacher->photo=$directory . DIRECTORY_SEPARATOR . $filename;
                    }
            }
            $teacher->save();
            return $response->withRedirect('/admin/teacher/list/');
            });

            $app->get('/admin/teacher/del/{id}/', function ($request,  $response,$args) use($Views) {   
                $teacher = Teacher::where('id',$args)->first();
                $teacher->delete();
                return $response->withRedirect('/admin/teacher/list/'); 
                });

            
