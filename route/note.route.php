<?php
use Models\Note;
use Models\Level;

$app->get('/admin/note/add/', function ($request,  $response) use($Views) {
         echo $Views->make('back.note.add',['levels'=>Level::all()]);
    });


$app->post('/admin/note/add/', function ($request,  $response) use($Views) {
        $parsedBody = $request->getParsedBody();
        // $note = Note::create($parsedBody);
        $note = new Note();
        $note->title = $parsedBody['title'];
        $note->level_id = $parsedBody['level_id'];
        $note->description = $parsedBody['description'];
        $uploadedFile=$request->getUploadedFiles()['file'];
        $directory="asset/notes";
        $uf=$uploadedFile;
        $filename = $uf->name;   
        $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
        $note->file=$directory . DIRECTORY_SEPARATOR . $filename;
        $note->filename= $filename;
        $note->save();
        return $response->withRedirect('/admin/note/list/');
    });


$app->get('/admin/note/list/', function ($request,  $response) use($Views) {
        echo $Views->make('back.note.list',['notes'=>Note::all()]);
   });

$app->get('/admin/note/edit/{id}/', function ($request,  $response, $args) use($Views) {
    $note = Note::where('id',$args)->first();
    $level = Level::all();
    echo $Views->make('back.note.edit',['note'=>$note,'levels'=>$level]);
});

$app->post('/admin/note/edit/{id}/', function ($request,  $response, $args) use($Views) {
    $parsedBody = $request->getParsedBody();
    $note = Note::where('id',$args)->first();
    $note->title = $parsedBody['title'];
    $note->level_id = $parsedBody['level_id'];
    $note->description = $parsedBody['description'];
    if(isset($request->getUploadedFiles()['file'])){
    $uploadedFile=$request->getUploadedFiles()['file'];
        $directory="asset/notes";
        $uf=$uploadedFile;
        $filename = $uf->name; 
        if($filename!=""){  
        $note->filename= $filename; 
        $uf->moveTo($directory . DIRECTORY_SEPARATOR . $filename);       
        $note->file=$directory . DIRECTORY_SEPARATOR . $filename;
       
    }
}
    $note->save();
    return $response->withRedirect('/admin/note/list/');
});


$app->get('/admin/note/del/{id}/', function ($request,  $response, $args) use($Views) {
    $note = Note::where('id',$args)->first();
    $note->delete();
    return $response->withRedirect('/admin/note/list/');
});