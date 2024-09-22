<?php

namespace Mille\Request;


class Response{
    public static function setStatus(int $code){
        http_response_code($code);
    }
}
