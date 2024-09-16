<?php

namespace Mille\Request;
use Mille\Request\Http;

class Response extends Http{
    public static function resolve(){
        $method = self::getMethod();
    }
}