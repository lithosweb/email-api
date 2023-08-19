<?php

declare(strict_types=1);

namespace email\model;

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

    public function __construct()
    {
        $this->get = new Get;
        $this->post = new Post;
        $this->patch = new Patch;
        $this->delete = new Delete;
    }

    public function Get($uri, $data): void
    {
        $this->get->process($uri, $data);
    }

    public  function Post($uri, $data): void
    {
        $this->post->process($uri, $data);
    }

    public  function Patch($uri, $data): void
    {
        $this->patch->process($uri, $data);
    }

    public  function Delete($uri, $data): void
    {
        $this->delete->process($uri, $data);
    }
}
