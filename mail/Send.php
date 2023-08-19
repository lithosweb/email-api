<?php

declare(strict_types=1);

namespace email\mail;

use email\mail\storage\Fail;
use email\mail\storage\Log;
use email\mail\storage\Success;
use email\model\Json;

class Send
{
    public Json $json;
    public Fail $fail;
    public Success $success;
    public Log $log;
    public Gmail $g;
    public Zungvi $z;

    public function __construct()
    {
        $this->fail = new Fail;
        $this->success = new Success;
        $this->log = new Log;
        $this->json = new Json;
        $this->z = new Zungvi;
        $this->g = new Gmail;
    }
    public function sendEmail($to, $subj): bool
    {
        $z = $this->z->send($to, $subj);
        if ($z == true) {
            $this->json->message(201, 'Created', 'Message sent');
            $this->success->save($to, $z, 'Zungvi');
            $this->log->save($to, $z, 'Zungvi');
            return $z;
        } else {
            $this->json->message(202, 'Accepted', 'Message not sent');
            $this->fail->save($to, $z, 'Zungvi');
            $this->log->save($to, $z, 'Zungvi');
            return $z;
        }

        $g = $this->g->send($to, $subj);
        if ($g == true) {
            $this->json->message(201, 'Created', 'Message sent');
            $this->success->save($to, $g, 'Gmail');
            $this->log->save($to, $g, 'Gmail');
            return $g;
        } else {
            $this->json->message(202, 'Accepted', 'Message not sent');
            $this->fail->save($to, $g, 'Gmail');
            $this->log->save($to, $g, 'Gmail');
            return $g;
        }
    }
}
