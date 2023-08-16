<?php

declare(strict_types=1);

namespace email\helpers;

use Dotenv\Dotenv;
use email\helpers\Helpers;

class Env_ implements Helpers
{
    public static function get(): array
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        return (array) $dotenv->safeLoad();
    }
}
