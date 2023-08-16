<?php

declare(strict_types=1);

namespace email\model;

use email\mail\Send;
use email\model\uri\Delete;
use email\model\uri\Get;
use email\model\uri\Patch;
use email\model\uri\Post;

class Uri
{
    public Get $get;
    public Post $post;
    public Patch $patch;
    public Delete $delete;
    public Send $s;

    public function __construct()
    {
        $this->get = new Get;
        $this->post = new Post;
        $this->patch = new Patch;
        $this->delete = new Delete;
        $this->s = new Send;
    }

    public function Get()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        return $this->get->process($data);
    }

    public  function Post()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        return $this->post->process($data);
    }

    public  function Patch()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->post->process($data);;
    }

    public  function Delete()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->post->process($data);
    }
}
