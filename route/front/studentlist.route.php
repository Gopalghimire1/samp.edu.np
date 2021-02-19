<?php

use Models\Studentlist;

$app->get('/admin/studentlist/list/', function ($request,  $response) use($Views) {
    $d = Studentlist::orderBy('id','desc')->get();
    echo $Views->make('back.studentlist.create',['studentlist'=>$d]);
    });

    $app->get('/admin/sstudentlist/create/', function ($request,  $response) use($Views) {
        echo $Views->make('back.studentlist.create');
        });


        $app->post('/admin/studentlist/create/', function ($request,  $response) use($Views) {
           $parse = $request->getParsedBody();
           $d = new Studentlist();
           $d->title = $parse['title'];
           $d->date = $parse['date'];
           $d->detail = $parse['desc'];
           
            $uploadedFile=$request->getUploadedFiles()['file'];
            $directory="assets/img/studentlist";
            $uf=$uploadedFile;
            $filename = $uf->name;   
            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
            $d->file=$directory . DIRECTORY_SEPARATOR . $filename;
            $d->save();
            return $response->withRedirect('/admin/studentlist/list/');
            });

            $app->get('/admin/studentlist/edit/{id}/', function ($request,  $response, $id) use($Views) {
                $d = Studentlist::where('id',$id)->first();
                echo $Views->make('back.studentlist.edit',['studentlist'=>$d]);
                });


                $app->post('/admin/studentlist/edit/{id}/', function ($request,  $response, $id) use($Views) {
                    $parse = $request->getParsedBody();
                    $d = Studentlist::where('id',$id)->first();
                    $d->title = $parse['title'];
                    $d->date = $parse['date'];
                    $d->detail = $parse['desc'];


                    if(isset($request->getUploadedFiles()['file'])){
                        $uploadedFile=$request->getUploadedFiles()['file'];
                                $directory="assets/img/studentlist";
                                $uf=$uploadedFile;
                                $filename = $uf->name; 
                                if($filename!=""){  
                                $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                                $d->file=$directory . DIRECTORY_SEPARATOR . $filename;
                                }
                        }

                        $d->save();
                        return $response->withRedirect('/admin/studentlist/list/');    
                    });