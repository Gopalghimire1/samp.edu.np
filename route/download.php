<?php
use Models\Download;

$app->get('/admin/download/list/', function ($request,  $response) use($Views) {
    $d = Download::orderBy('id','desc')->get();
    echo $Views->make('back.download.list',['download'=>$d]);
    });

    $app->get('/admin/download/add/', function ($request,  $response) use($Views) {
        echo $Views->make('back.download.add');
        });


        $app->post('/admin/download/add/', function ($request,  $response) use($Views) {
           $parse = $request->getParsedBody();
           $d = new Download();
           $d->title = $parse['title'];
           $d->date = $parse['date'];
           $d->detail = $parse['desc'];
           
            $uploadedFile=$request->getUploadedFiles()['file'];
            $directory="assets/img/download";
            $uf=$uploadedFile;
            $filename = $uf->name;   
            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
            $d->file=$directory . DIRECTORY_SEPARATOR . $filename;
            $d->save();
            return $response->withRedirect('/admin/download/list/');
            });

            $app->get('/admin/download/edit/{id}/', function ($request,  $response, $id) use($Views) {
                $d = Download::where('id',$id)->first();
                echo $Views->make('back.download.edit',['download'=>$d]);
                });


                $app->post('/admin/download/edit/{id}/', function ($request,  $response, $id) use($Views) {
                    $parse = $request->getParsedBody();
                    $d = Download::where('id',$id)->first();
                    $d->title = $parse['title'];
                    $d->date = $parse['date'];
                    $d->detail = $parse['desc'];


                    if(isset($request->getUploadedFiles()['file'])){
                        $uploadedFile=$request->getUploadedFiles()['file'];
                                $directory="assets/img/download";
                                $uf=$uploadedFile;
                                $filename = $uf->name; 
                                if($filename!=""){  
                                $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                                $d->file=$directory . DIRECTORY_SEPARATOR . $filename;
                                }
                        }

                        $d->save();
                        return $response->withRedirect('/admin/download/list/');    
                    });