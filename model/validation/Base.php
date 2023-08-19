<?php

declare(strict_types=1);

namespace email\model\validation;

use email\mail\Send;
use email\model\Json;

abstract class Base {
    public Send $send;
    public Json $json;

    public function __construct()
    {
        $this->send = new Send;
        $this->json = new Json;
    }    
}