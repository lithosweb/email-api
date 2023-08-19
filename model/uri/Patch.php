<?php

declare(strict_types=1);

namespace email\model\uri;

class Patch extends Base
{
    public function process($url, $data): void
    {
        $this->va->firstCheck($data);

        switch ($url) {
            case '/api/v3/email/cron/edit':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v3/email/bucket/cron/edit':
                $this->va->notImplemented();
                exit;
                break;

            default:
                $this->va->switch_default();
                exit;
                break;
        }
    }
}
