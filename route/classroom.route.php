<?php
use Models\Classroom;
use Models\Level;
use Models\Mock;
$app->get('/admin/classroom/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.classroom.add',['levels'=>Level::all()]);
    });

$app->get('/admin/classroom/list/', function ($request,  $response) use($Views) {   
    echo $Views->make('back.classroom.list',['classrooms'=>Classroom::all()]);    
    });

    $app->post('/admin/classroom/add/', function ($request,  $response) use($Views) { 
        $parsedBody = $request->getParsedBody();
        $classroom = Classroom::create($parsedBody);
        return $response->withRedirect('/admin/classroom/list/');
        });


        $app->get('/admin/classroom/edit/{id}/', function ($request,  $response,$args) use($Views) {   
            echo $Views->make('back.classroom.edit',['classroom'=>Classroom::where('id',$args)->first(),'levels'=>Level::all()]);    
            });

         $app->post('/admin/classroom/edit/{id}/', function ($request,  $response,$args) use($Views) {  
              $classroom = Classroom::where('id',$args)->first();
              $parsedBody=$request->getParsedBody();
              $classroom->section = $parsedBody['section'];
              $classroom->level_id = $parsedBody['level_id'];
              $classroom->save();
              return $response->withRedirect('/admin/classroom/list/');  
             });


             $app->get('/admin/classroom/del/{id}/', function ($request,  $response,$args) use($Views) {   
                $classroom = Classroom::where('id',$args)->first();
                $classroom->delete();
                return $response->withRedirect('/admin/classroom/list/'); 
                });

                // $app->get('/admin/classroom/manage/{id}/', function ($request,  $response,$args) use($Views) {   
                  
                //     });


                $app->get('/admin/mocktest/Manage/{id}/', function($request, $response, $args) use($Views) {
                    // print_r(Classroom::where('id',$args)->first());
                      echo $Views->make('back.classroom.mocktest');
                });

                $app->post('/admin/mocktest/Manage/{id}/', function($request, $response, $args) use($Views) {
                      $parsed = $request->getParsedBody();
                      $mock = Mock::where('classroom_id',$args)->first();
                      if($mock!=null){
                         $mock->update($parsed);
                         echo $Views->make('back.classroom.mocktest');
                      }else{  
                          $parsed['classroom_id'] = $args['id'];                  
                          $mock1 = Mock::create($parsed);
                          echo $Views->make('back.classroom.mocktest');
                      }

                });