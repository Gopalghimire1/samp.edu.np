<?php
use Models\News;

$app->get('/admin/news/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.news.add');
    });

    $app->post('/admin/news/add/', function ($request,  $response) use($Views) {
        $parsedBody = $request->getParsedBody();
        $news = new News();
        $news->title = $parsedBody['title'];
        $news->publisher = $parsedBody['publisher'];
        $news->published = $parsedBody['published'];
        $news->news = $parsedBody['news'];

        $uploadedFile=$request->getUploadedFiles()['photo'];
        $directory="assets/img/news";
        $uf=$uploadedFile;
        $filename = $uf->name;   
        $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
        $news->photo=$directory . DIRECTORY_SEPARATOR . $filename;
        $news->save();

        return $response->withRedirect('/admin/news/list/');
        });

        $app->get('/admin/news/list/', function ($request,  $response) use($Views) {
            echo $Views->make('back.news.list',['newss'=>News::all()]);
            });

            $app->get('/admin/news/edit/{id}/', function ($request,  $response,$args) use($Views) {
                echo $Views->make('back.news.edit',['news'=>News::where('id',$args)->first()]);
                });
    

        $app->post('/admin/news/edit/{id}/', function ($request,  $response,$args) use($Views) {
                $parsedBody = $request->getParsedBody();
                $news=News::where('id',$args)->first();
                $news->title = $parsedBody['title'];
                $news->publisher = $parsedBody['publisher'];
                $news->published = $parsedBody['published'];
                $news->news = $parsedBody['news'];

                if(isset($request->getUploadedFiles()['photo'])){
                    $uploadedFile=$request->getUploadedFiles()['photo'];
                            $directory="assets/img/news";
                            $uf=$uploadedFile;
                            $filename = $uf->name; 
                            if($filename!=""){  
                            $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
                            $news->photo=$directory . DIRECTORY_SEPARATOR . $filename;
                            }
                    }

                $news->save();
                return $response->withRedirect('/admin/news/list/');
                });

                $app->get('/admin/news/del/{id}/', function ($request,  $response,$args) use($Views) {   
                    $news = News::where('id',$args)->first();
                    $news->delete();
                    return $response->withRedirect('/admin/news/list/'); 
                    });