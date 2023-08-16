<?php

declare(strict_types=1);

namespace email\controller;

use Bramus\Router\Router as RouterRouter;
use email\model\Home;
use email\model\Uri;
use email\model\View;

class Router implements Controller
{
    public Uri $uri;
    public RouterRouter $router;
    public Home $h;

    public function __construct()
    {
        $this->uri = new Uri;
        $this->router = new RouterRouter;
        $this->h = new Home;
    }

    public function resolve(){
        $this->router->get('/', fn() => Home::home());
        // $this->router->get('/a', fn() => $this->h->async());
        $this->router->get('/api/v1', fn() => $this->uri->Get());
        $this->router->post('/api/v2', fn() => $this->uri->Post());
        $this->router->patch('/api/v3', fn() => $this->uri->Patch());
        $this->router->delete('/api/v4', fn() => $this->uri->Delete());
        return $this->router->run();
    }
}
