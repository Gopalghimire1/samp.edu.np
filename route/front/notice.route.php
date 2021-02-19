<?php
use Models\Notice;
use Models\News;
use Models\Galary;
use Models\Photo;
$app->get('/notices/', function ($request,  $response) use($Views) {
    echo $Views->make('front.notice.list',['notices'=>Notice::orderBy('id','desc')->get()]);
});

$app->get('/notice/single/{id}/', function ($request,  $response, $id) use($Views) {
        echo $Views->make('front.notice.single',['notice'=>Notice::where('id',$id)->first()]);
});

$app->get('/news/', function ($request,  $response) use($Views) {
    echo $Views->make('front.news.list',['news'=>News::all()]);
});

$app->get('/news/{id}/', function ($request,  $response,$id) use($Views) {
        echo $Views->make('front.news.single',['news'=>News::where('id',$id)->first()]);
});

$app->get('/galary/', function ($request,  $response) use($Views) {
    echo $Views->make('front.galary.list',['galaries'=>Galary::all()]);
});
$app->post('/galary/photos/', function ($request,  $response) use($Views) {
    $parsedBody = $request->getParsedBody();
    $photos=Photo::where('galary_id',$parsedBody['id'])->get();
    return $response->withJson($photos);
});