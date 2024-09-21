<?php

namespace Mille\Request;
use Mille\Request\Response;
use Mille\Request\Request;


class Route extends Response{
	public Request $request;
	public Response $response;
	public array $routes = [];
	
	public function __construct(Request $request, Response $Response){
		$this->request = $request;
		$this->response = $response;
	}

	public function get(string $path, $call){
		$this->routes['GET'][$path] = $call;
	}

	public function resolve(){
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$call = $this->routes[$method][$path];
		$dataRequest = $this->request->getDataRequest();
		return call_user_func($call,$dataRequest);
	}
}


