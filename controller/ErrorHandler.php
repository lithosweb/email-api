<?php

declare(strict_types=1);

namespace email\controller;

use Exception;

class ErrorHandler extends Exception
{
    public function prod()
    {
        return error_reporting(0);
    }
    
    public function dev()
    {
        return error_reporting(E_ALL);
    }
}
