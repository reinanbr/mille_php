<?php

namespace Mille\Request;
use Mille\Request\Response;
use Mille\Request\Request;

//use Mille\Request\ClientRequest;

class Route extends Response{
	public Request $request;
	public Response $response; 
	public array $routes = [];
	
	public function __construct(Request $request, Response $response){
		$this->request = $request;
		$this->response = $response;
	}

	public function get(string $path, $call){
		$this->routes['GET'][$path] = $call;
	}

	public function resolve(){
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$call = $this->routes[$method][$path] ?? false;
		if($call==false){
           		$this->response->setStatus(404);
            		return "_404";
		}
		$dataRequest = $this->request->client_info($method);
		return call_user_func($call,$dataRequest);
	}
}


