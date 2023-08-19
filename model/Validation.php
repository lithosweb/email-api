<?php

declare(strict_types=1);

namespace email\model;

use email\model\validation\Delete;
use email\model\validation\Get;
use email\model\validation\Patch;
use email\model\validation\Post;

class Validation {

    public Json $json;
    public Get $get;
    public Post $post;
    public Patch $patch;
    public Delete $delete;

    public function __construct()
    {
        $this->json = new Json;
        $this->get = new Get;
        $this->post = new Post;
        $this->patch = new Patch;
        $this->delete = new Delete;
    }

    public function switch_default(): void
    {
        $this->json->message(400, 'Bad Request', 'Nothing here, fix your URI');
        exit;
    }
    
    public function notImplemented(): void
    {
        $this->json->message(503, 'Service Unavailable', 'Not implemented yet');
        exit;
    }
    
    public function firstCheck($data): void
    {
        if ($data == null) {
            $this->json->message(401, 'Unauthorized', 'Data must be in json format');    
            exit;
        }

        if (!array_key_exists('_auth', $data)) {
            $this->json->message(403, 'Forbidden', 'No authentication detected');
            exit;
        }

        if (!password_verify('authentication', '$2y$10$' . $data['_auth'])) {
            $this->json->message(401, 'Unauthorized', 'Wrong authentication key');
            exit;
        }
    }
}
