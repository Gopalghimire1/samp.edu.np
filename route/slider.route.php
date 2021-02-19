<?php
use Models\Slider;

$app->get('/admin/slider/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.slider.add');
    });

 $app->post('/admin/slider/add/', function ($request,  $response) use($Views) {
          $parsed = $request->getParsedBody();
          $slider = new Slider();
          
        $uploadedFile=$request->getUploadedFiles()['image'];
        $directory="assets/img/slider";
        $uf=$uploadedFile;
        $filename = $uf->name;   
        $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
        $slider->image=$directory . "/" . $filename;

        $slider->link = $parsed['link'];
        $slider->caption = $parsed['caption'];
        $slider->subcaption = $parsed['subcaption'];
        $slider->button = $parsed['button'];
        $slider->save();
        return $response->withRedirect('/admin/slider/list/');
        });

     $app->get('/admin/slider/list/', function ($request,  $response) use($Views) {
            $slider = Slider::all();
            echo $Views->make('back.slider.list',['sliders'=>$slider]);
            });

    $app->get('/admin/slider/edit/{id}/', function($request, $response, $args) use($Views){
          $slider = Slider::where('id', $args)->first(); 
          echo $Views->make('back.slider.edit',['slider'=>$slider]);
    });

     $app->post('/admin/slider/edit/{id}/', function ($request,  $response, $args) use($Views) {
              $parsed = $request->getParsedBody();
              $slider = Slider::where('id', $args)->first(); 

               if(isset($request->getUploadedFiles()['image'])){
                    $uploadedFile=$request->getUploadedFiles()['image'];
                            $directory="assets/img/slider";
                            $uf=$uploadedFile;
                            $filename = $uf->name; 
                            if($filename!=""){  
                            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                            $slider->image=$directory . "/" . $filename;
                            }
                    }
      
              $slider->link = $parsed['link'];
              $slider->caption = $parsed['caption'];
              $slider->subcaption = $parsed['subcaption'];
              $slider->button = $parsed['button'];
              $slider->save();
              return $response->withRedirect('/admin/slider/list/');
              });


     $app->get('/admin/slider/del/{id}/', function ($request,  $response, $args) use($Views) {
            $slider = Slider::where('id', $args)->first();
            $slider->delete();
            return $response->withRedirect('/admin/slider/list/');
                });
      