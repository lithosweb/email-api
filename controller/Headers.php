<?php

declare(strict_types=1);

namespace email\controller;

class Headers
{
    public static function setHeader()
    {
        header('Content-type: application/json');        
        header('Accept: application/json');        
        header('Content: application/json');        
        header('X-Powered-By: Zungvi');      
    }

    public function processData()
    {
    }
}
