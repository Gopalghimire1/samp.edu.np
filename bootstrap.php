<?php
require "variables.php";
require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as DB;
use Jenssegers\Blade\Blade;

$Views = new Blade('views', 'cache');
$DB = new DB;
$modeldir="model\\";
$routedir="routes\\";
$key=md5("needtech");

function addroute($route) 
{
$app=$GLOBALS['app'];
$Views=$GLOBALS['Views'];
require $GLOBALS['routedir'].$route.".route.php";
}

$setting=[
    "driver" => "mysql",
    "host" =>"127.0.0.1",
    // "database" => "newsfilm_sailaja",
    // "username" => "newsfilm_newsfilm",
    // "password" => "sailaja123@"
    "database" => "fleet",
    "username" => "root",
    "password" => ""
];
$DB->addConnection($setting);

// print_r($Views);
$DB->setAsGlobal();
$DB->bootEloquent();