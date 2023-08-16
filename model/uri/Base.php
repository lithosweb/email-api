<?php

declare(strict_types=1);

namespace email\model\uri;

use Egulias\EmailValidator\EmailValidator;
use email\mail\Send;

class Base {

    public Send $s;
    public EmailValidator $ev;

    public function __construct()
    {
        $this->s = new Send;
    }

    public function notFound()
    {
        http_response_code(404);
        echo json_encode([
            'code' => '404',
            'message' => 'content type must be in json format',
        ]);
        return;
    }
}