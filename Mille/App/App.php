<?php

namespace Mille\App;
use Mille\Request\Route;

class App extends Route{

    public function __construct($rootPath){
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        /*
        $this->request = new Request();
        $this->response = new response();
        $this->router = new Router($this->request,$this->response);
        */
    }
    public function route($method='GET',$path,$callback){
        return $this->resolve();
    }
}