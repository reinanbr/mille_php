<?php
require_once __DIR__.'/../vendor/autoload.php';

use Mille\App\App;
//use Mille\Middle\Render;
//use Mille\Middle\jsonify;


$app = new App(__DIR__);


$app->route($method='get',$path='/',function($request){
   // $params = $request->params;
    return "<h1>oi</h1>";
});

$app->run();



/*
$app->route($method='post',$path='/send_info',function($request){
    $data = $request->params;
    if(validate_data($data)){
        return jsonify([
            'status'=>'ok'
        ]);
    }
});
*/
