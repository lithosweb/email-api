<?php

declare(strict_types=1);

namespace email\mail;

use email\helpers\Env_;
use PHPMailer\PHPMailer\PHPMailer;

abstract class Email
{
    public array $env;
    public PHPMailer $mail;

    public function __construct()
    {
        $this->env = (array) json_decode(file_get_contents(__DIR__ . '/../secrets.json'), true);
        $this->mail = new PHPMailer();
    }
}
