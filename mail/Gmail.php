<?php

declare(strict_types=1);

namespace email\mail;

use email\model\View;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Gmail extends Email
{

    public function send($to, $subject = 'welcome',): bool
    {
        $env = $this->env; 

            // Server Settings
            // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->Host = $env['GMAIL_DRIVER_HOST'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $env['GMAIL_DRIVER_USERNAME'];
            $this->mail->Password = $env['GMAIL_DRIVER_PASSWORD'];
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = $env['GMAIL_DRIVER_TLS_PORT'];

            // Recepients
            $this->mail->setFrom($env['GMAIL_DRIVER_USERNAME'], $env['GMAIL_DRIVER_NAME']);
            $this->mail->addAddress($to);

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = ucfirst($subject);
            $htmll = View::getHtml(html: $subject);
            $this->mail->Body    = $htmll;

            // Send Email
            return $this->mail->send();
    }
}
