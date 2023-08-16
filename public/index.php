<?php

declare(strict_types=1);

use email\controller\Headers;
use email\controller\Router;

require_once __DIR__ . '/../vendor/autoload.php';
 
Headers::setHeader();
$router = new Router;
$router->resolve();