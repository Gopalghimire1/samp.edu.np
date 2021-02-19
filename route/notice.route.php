<?php
use Models\Notice;

$app->get('/admin/notice/add/', function ($request,  $response) use($Views) {
    echo $Views->make('back.notice.add');
    });

    $app->post('/admin/notice/add/', function ($request,  $response) use($Views) {
        $parsedBody = $request->getParsedBody();
        $notice = Notice::create($parsedBody);
        $image = $request->getUploadedFiles()['image'];
        if(($image->getSize()>0)){
            
            $imagename = time() . "_" . $image->getClientFilename();
            $image->moveTo("assets/img/page/" . $imagename);
            $notice->image = $imagename;
        }
        $notice->save();
        return $response->withRedirect('/admin/notice/list/');
        });

        $app->get('/admin/notice/list/', function ($request,  $response) use($Views) {
            echo $Views->make('back.notice.list',['notices'=>Notice::all()]);
            });

            $app->get('/admin/notice/edit/{id}/', function ($request,  $response,$args) use($Views) {
                echo $Views->make('back.notice.edit',['notice'=>Notice::where('id',$args)->first()]);
                });
    

        $app->post('/admin/notice/edit/{id}/', function ($request,  $response,$args) use($Views) {
                $parsedBody = $request->getParsedBody();
                $notice=Notice::where('id',$args)->first();
                $notice->title = $parsedBody['title'];
                $notice->publisher = $parsedBody['publisher'];
                $notice->published = $parsedBody['published'];
                $notice->description = $parsedBody['description'];

                $image = $request->getUploadedFiles()['image'];
                if(!empty($image)){
                    
                    $imagename = time() . "_" . $image->getClientFilename();
                    $image->moveTo("assets/img/page/" . $imagename);
                    $notice->image = $imagename;
                }

                $notice->save();
                return $response->withRedirect('/admin/notice/list/');
                });

                $app->get('/admin/notice/del/{id}/', function ($request,  $response,$args) use($Views) {   
                    $notice = Notice::where('id',$args)->first();
                    $notice->delete();
                    return $response->withRedirect('/admin/notice/list/'); 
                    });