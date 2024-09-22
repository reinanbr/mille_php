<?php

namespace Mille\App;

use Mille\Request\Route;
use Mille\Request\request;
use Mille\Request\Response;

class App {
    public Route $route;
    public Request $request;
    public static App $app;
    public Response $response;
    public static $ROOT_DIR;
    public Route $router;

    public function __construct($rootPath){
	self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Route($this->request,$this->response);
    }

    public function route($method,$path,$callback){
	if($method==='GET'){
		$this->router->get($path,$callback);
	}
	else{
		echo "method '$method' not found";
	}
    }

    public function run(){
	echo $this->router->resolve();
    
    }
}
