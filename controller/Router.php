<?php

declare(strict_types=1);

namespace email\controller;

use Bramus\Router\Router as RouterRouter;
use email\helpers\Sanitize;
use email\model\Uri;

class Router implements Controller
{
    public Uri $uri;
    public RouterRouter $router;

    public function __construct()
    {
        $this->uri = new Uri;
        $this->router = new RouterRouter;
    }

    public function path(): string
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public function resolve()
    {
        $data = Sanitize::get(json_decode(file_get_contents('php://input'), true));
        $url = Sanitize::get($this->path());

        $this->router->get($url, fn() => $this->uri->Get($url, $data));

        $this->router->post($url, fn () => $this->uri->Post($url, $data));

        $this->router->patch($url, fn () => $this->uri->Patch($url, $data));

        $this->router->delete($url, fn () => $this->uri->Delete($url, $data));

        return $this->router->run();
    }
}
