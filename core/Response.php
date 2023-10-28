<?php

namespace app\core;

/**
 * Response Handler class.
 */
class Response
{
    /**
     * Status code settere function.
     * 
     * @param  int     $code
     * @return void
     */
    public function setStatusCode( int $code)
    {
        http_response_code($code);
    }
}

?>