<?php 
use Models\Bill;
use Models\Billitem;
use Models\Level;
use Models\Fee;



$app->post('/admin/bill/add/', function($request, $response) use($Views){
    $arr=[];
    $parsed = $request->getParsedBody();
    $bill = new Bill();
    $bill->date = $parsed['date'];
    $bill->student_id = $parsed['student_id'];
    $bill->level_id = $parsed['level_id'];
    // $bill->total = $parsed['total'];
    $bill->save();
    array_push($arr,$bill);
    for ($i=0; $i < $parsed['billitemcount']; $i++) { 
        $billitem = new Billitem();
        $billitem->prt = $parsed['title-'.$i];
        $billitem->rate = $parsed['rate-'.$i];
        $billitem->qty = $parsed['amount-'.$i];
        $billitem->bill_id = $bill->id; 
        $billitem->fee_id = $parsed['feeid-'.$i];
        $billitem->save();
        array_push($arr,$billitem);
    }
    return $response->withJson($arr);
});

$app->get('/admin/fee/{level_id}/',function($request, $response,$args){
      $fees= Fee::where('level_id',$args)->get();
      return $response->withJson($fees);
});