<?php 
use Models\Exam;
use Models\Callback;
use Models\Examclass;
use Models\Examsubject;
use Models\Result;

$app->group('/api/exam', function($app){

    $app->get('/list/', function($request, $response){
        return $response->withJson(new Callback(['exams'=>Exam::all()]));
    });

})->add(new Middleware\AuthMiddleware([0,1,2,3],$app->getContainer()['auth']));

$app->group('/api/exam', function($app){
        
        $app->post('/add/',function($requset, $response){
            $parsedBody = $request->getParsedBody();
            $exam = Exam::create($parsedBody);
            return $response->withJson(new Callback(['exam'=>$exam]));
        });

        $app->post('/edit/{id}', function($request, $response, $args){
            $parsedBody = $request->getParsedBody();
            $exam = Exam::where('id', $args)->first();
            $exam->update($parsedBody);
            return $response->withJson(new Callback(['exam'=>$exam]));
        });
        $app->post('/level/add/{id}/', function($request, $response){
             $parsedBody = $request->getParsedBody();
             $count=Examclass::where(['level_id'=>$parsedBody['level_id'],'exam_id'=>$args['id']])->count();
             if($count<1){
                $exlevel = new Examclass();
                $exlevel->exam_id = $args['id'];        
                $exlevel->level_id=$parsedBody['level_id'];
                $exlevel->save();
                return $response->withJson(new Callback(['examlevel'=>$exlevel]));
             }else{
                return $response->withJson('Exam level inused');
             }

        });

        $app->post('/examclass/subject/add/{id}/', function ($request, $response,$args){
            $parsedBody = $request->getParsedBody();
            $parsedBody['examclass_id']=$args['id'];
            $sub=Examsubject::create($parsedBody);
            return $response->withJson(new Callback(['examsubject'=>$sub]));
       });

       $app->get('/{id}/examclasses/', function ($request, $response,$args){
           $examclasses = Examclass::where('exam_id',$args['id'] )->get();
           $examclasses_array=[];
           foreach ($examclasses as $key => $examclass) {
               $ec=$examclass;
               $ec->level=$examclass->level()->name;
               array_push($examclasses_array,$ec);
           }
           return $response->withJson(new Callback(['examclasses'=>$examclasses_array]));
   });

   $app->get('/examclass/{id}/examsubjects/', function ($request, $response,$args){
    $examsubjects = Examsubject::where('examclass_id',$args['id'])->get();
    return $response->withJson(new Callback(['examsubjects'=>$examsubjects]));
});

    
})->add(new Middleware\AuthMiddleware([0,1],$app->getContainer()['auth']));


