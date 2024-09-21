<?php

namespace Mille\App;

use Mille\Request\Route;
use Mille\Request\request;
use Mille\Request\Response;

class App {
    public Route $route;
    public Request $request;
    public App $app;
    public Response $response;
    public static $ROOT_DIR;

    public function __construct($rootPath){
	self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Route($this->request,$this->response);
    }

    public function route($method='GET',$path,$callback){
	if($method==='GET'){
		$this->router->get($path,$callback);
	}
    }

    public function run(){
	echo $this->router->resolve();
    
    }
}
