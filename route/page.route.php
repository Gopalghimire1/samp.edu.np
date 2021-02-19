<?php

use Models\Event;
use Models\Page;
use Models\Faculty;
use Models\Member;
use Models\Openadmission;

$app->get('/admin/course/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.add', ['title' => ' Course', 'type' => course]);
});

$app->get('/admin/course/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.list', ['title' => ' Courses', 'type' => course]);
});

$app->get('/admin/message/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.add', ['title' => ' Message', 'type' => message]);
});

$app->get('/admin/message/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.list', ['title' => ' Messages', 'type' => message]);
});

$app->get('/admin/feature/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.add', ['title' => ' Feature', 'type' => feature]);
});

$app->get('/admin/feature/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.list', ['title' => ' Features', 'type' => feature]);
});


$app->get('/admin/page/edit/{id}/', function ($request,  $response,$args) use ($Views) {
    $page=Page::find($args['id']);
    echo $Views->make('back.page.edit', ['page' => $page]);
});

$app->post('/admin/page/edit/{id}/', function ($request,  $response,$args) use ($Views) {
    // print_r( $image = $request->getUploadedFiles());
    // die();
    $page=Page::find($args['id']);
    $data = $request->getParsedBody();
    $page->title=$data['title'];
    $page->body=$data['body'];
    $image = $request->getUploadedFiles()['image'];
    if(($image->getSize()>0)){
        
        $imagename = time() . "_" . $image->getClientFilename();
        $image->moveTo("assets/img/page/" . $imagename);
        $page->image = $imagename;
    }
    $page ->save();
    if ($page->type == course) {
        return $response->withRedirect('/admin/course/list/');
    } else if ($page->type == feature) {
        return $response->withRedirect('/admin/feature/list/');
    }else if($page->type==message){
        return $response->withRedirect('/admin/message/list/');
    }
});

$app->post('/admin/page/add/', function ($request,  $response) use ($Views) {
    $data = $request->getParsedBody();
    $image = $request->getUploadedFiles()['image'];
    $imagename = time() . "_" . $image->getClientFilename();
    $image->moveTo("assets/img/page/" . $imagename);
    $data['image'] = $imagename;
    $page = Page::create($data);
    if ($page->type == course) {
        return $response->withRedirect('/admin/course/list/');
    } else if ($page->type == feature) {
        return $response->withRedirect('/admin/feature/list/');
    }else if($page->type==message){
        return $response->withRedirect('/admin/message/list/');
    }
});

$app->get('/admin/page/del/{id}/', function ($request,  $response, $vars) use ($Views) {
    $page = Page::find($vars['id']);
    $type = $page->type;
    $page->delete();
    if ($type == course) {
        return $response->withRedirect('/admin/course/list/');
    }else if ($type == feature) {
        return $response->withRedirect('/admin/feature/list/');
    }else if($type==message){
        return $response->withRedirect('/admin/message/list/');
    }
});

//faculty

$app->post('/admin/faculty/add/', function ($request,  $response) use ($Views) {
    $data = $request->getParsedBody();
    Faculty::create($data);
    return $response->withRedirect('/admin/faculty/list/');
});
$app->get('/admin/faculty/del/{id}/', function ($request,  $response, $vars) use ($Views) {
    $faculty = Faculty::find($vars['id']);
    $faculty->delete();
    return $response->withRedirect('/admin/faculty/list/');
});

$app->get('/admin/faculty/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.faculty');
});

//end faculty

//openadmissions

$app->get('/admin/opad/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.openadmission.add');
});
$app->post('/admin/opad/add/', function ($request,  $response) use ($Views) {
    $data = $request->getParsedBody();
    Openadmission::create($data);
    return $response->withRedirect('/admin/opad/list/');
});
//edit
$app->get('/admin/opad/edit/{id}/', function ($request,  $response,$vars) use ($Views) {
    $opad = Openadmission::find($vars['id']);

    echo $Views->make('back.openadmission.edit',['opad'=>$opad]);
});
$app->post('/admin/opad/edit/{id}/', function ($request,  $response,$vars) use ($Views) {
    $data = $request->getParsedBody();
    Openadmission::where('id',$vars['id'])->update($data);
    return $response->withRedirect('/admin/opad/list/');
});
//end edit
$app->get('/admin/opad/del/{id}/', function ($request,  $response, $vars) use ($Views) {
    $opad = Openadmission::find($vars['id']);
    $opad->delete();
    return $response->withRedirect('/admin/opad/list/');
});
$app->get('/admin/opad/open/{id}/', function ($request,  $response, $vars) use ($Views) {
    $opad = Openadmission::find($vars['id']);
    $opad->enabled=1;
    $opad->save();
    return $response->withRedirect('/admin/opad/list/');
});
$app->get('/admin/opad/close/{id}/', function ($request,  $response, $vars) use ($Views) {
    $opad = Openadmission::find($vars['id']);
    $opad->enabled=0;
    $opad->save();
    return $response->withRedirect('/admin/opad/list/');
});

$app->get('/admin/opad/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.openadmission.list');
});
//end openadmissions

//Members
$app->get('/admin/member/add/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.member.add');
});

$app->post('/admin/member/add/', function ($request,  $response) use ($Views) {
    $data = $request->getParsedBody();
    $image = $request->getUploadedFiles()['image'];
    $imagename = time() . "_" . $image->getClientFilename();
    $image->moveTo("assets/img/page/" . $imagename);
    $data['image'] = $imagename;
    $page = Member::create($data);
    return $response->withRedirect('/admin/member/list/');
});

$app->get('/admin/member/edit/{id}/', function ($request,  $response,$args) use ($Views) {
    $data=Member::find($args['id']);
    echo $Views->make('back.member.edit',['data'=>$data]);
});
$app->get('/admin/member/del/{id}/', function ($request,  $response,$args) use ($Views) {
    $data=Member::find($args['id']);
    $data->delete();
    return $response->withRedirect('/admin/member/list/');
   
});

$app->post('/admin/member/edit/{id}/', function ($request,  $response,$args) use ($Views) {
    $data=Member::find($args['id']);
    $data = $request->getParsedBody();
    $data->title=$data['title'];
    $data->desig=$data['desig'];

    $image = $request->getUploadedFiles()['image'];
    if(!empty($image)){

        $imagename = time() . "_" . $image->getClientFilename();
        $image->moveTo("assets/img/page/" . $imagename);
    $data->image = $imagename;
    }
    $data->save();
    return $response->withRedirect('/admin/member/list/');
});

$app->get('/admin/member/list/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.member.list');
});
//end members

//about us
$app->get('/admin/aboutus/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.aboutus');
});
$app->post('/admin/aboutus/save/', function ($request,  $response) use ($Views) {
    $aboutus=\Models\Aboutus::first();
    if($aboutus==null){
        $aboutus=new \Models\Aboutus();
    }
    $data = $request->getParsedBody();
    $aboutus->page=$data['page'];
    $aboutus->save();
    return $response->withRedirect('/admin/aboutus/');
});

$app->get('/admin/video/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.video');
});
$app->post('/admin/video/save/', function ($request,  $response) use ($Views) {
    $video=\Models\Video::first();
    if($video==null){
        $video=new \Models\Video();
    }
    $data = $request->getParsedBody();
    $video->link=$data['Link'];
    $image = $request->getUploadedFiles()['image'];
    if(!empty($image)){

        $imagename = time() . "_" . $image->getClientFilename();
        $image->moveTo("assets/img/page/" . $imagename);
        $video->image = $imagename;
    }
    $video->save();
    return $response->withRedirect('/admin/video/');
});


//end about us
$app->get('/admin/popup/', function ($request,  $response) use ($Views) {
    echo $Views->make('back.page.popup');
});
$app->post('/admin/popup/save/', function ($request,  $response) use ($Views) {
    $video=\Models\Popup::first();
    if($video==null){
        $video=new \Models\Popup();
    }
    $data = $request->getParsedBody();
    $video->body=$data['body'];
    $video->status=$data['status']??0;
        $images = $request->getUploadedFiles();
        if(!empty($images['image'])){
            $image=$images['image'];
            $imagename = time() . "_" . $image->getClientFilename();
            $image->moveTo("assets/img/page/" . $imagename);
            $video->image = $imagename;
        } 
    $video->save();
    return $response->withRedirect('/admin/popup/');
});


//end about us