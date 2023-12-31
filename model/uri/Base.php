<?php

declare(strict_types=1);

namespace email\model\uri;

use email\model\Json;
use email\model\Validation;

abstract class Base
{
    public Validation $va;
    public Json $json;

    public function __construct()
    {
        $this->va = new Validation;
        $this->json = new Json;
    }
}
