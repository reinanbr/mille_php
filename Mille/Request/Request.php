<?php


namespace Mille\Request;
use Mille\Request\ClientInfo;

class Request{    
	private ClientRequest $client_info;

	public function client_info($method){
		$this->client_info = new ClientRequest($method);
		return $this->client_info;
	}

	public static function getPath(){
        	$uri = $_SERVER["REQUEST_URI"] ?? "/";
        	$path = $uri;
        	$position = strpos($path, '?');
        	if ($position === false) {
            		return $path;
        	}
        	return substr($path, 0, $position);
    	}

    	public static function getMethod(){
        	$methodHttp = $_SERVER["REQUEST_METHOD"];
        	return $methodHttp;
    	}

	public function getDataRequest(){
        	return array(
            		"POST"=>$_POST,
            		"GET"=>$_GET
        		);
    	}

    	public function getInput(){
        	$phpInputJson = json_decode(file_get_contents("php://input"));
        	return $phpInputJson;
    	}
}



class ClientRequest{
	public array $params = [];
	private ClientInfo $client_info;


	public function __construct(string $method)
	{
		$this->client_info = new ClientInfo();
		if($method=='GET'){
			$this->params = $this->client_info->getGetData();				
		}	
	}
}
