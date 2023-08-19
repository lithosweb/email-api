<?php

declare(strict_types=1);

namespace email\mail;

use email\model\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Zungvi extends Email
{
    public function send($to, $subject = 'welcome'): bool
    {
        $env = $this->env; 

            // Server Settings
            // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->Host = $env['ZUNGVI_DRIVER_HOST'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $env['ZUNGVI_DRIVER_USERNAME'];
            $this->mail->Password = $env['ZUNGVI_DRIVER_PASSWORD'];
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $this->mail->Port = $env['ZUNGVI_DRIVER_SSL_PORT'];

            // Recepients
            $this->mail->setFrom($env['ZUNGVI_DRIVER_USERNAME'], $env['ZUNGVI_DRIVER_NAME']);
            $this->mail->addAddress($to);

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = ucfirst($subject);
            $htmll = View::renderPrint(html: $subject);
            $this->mail->Body    = $htmll;

            // Send Email
            return $this->mail->send();
    }
}
