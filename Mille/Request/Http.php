<?php


namespace Mille\Request;

class Http{
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


    public function getInputHttp(){
        $phpInputJson = json_decode(file_get_contents("php://input"));
        return $phpInputJson;
    }
}
