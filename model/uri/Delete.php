<?php

declare(strict_types=1);

namespace email\model\uri;

class Delete extends Base
{
    public function process($url, $data): void
    {
        $this->va->firstCheck($data);

        switch ($url) {
            case '/api/v4/email/cron':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v4/email/bucket/cron':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v4/email/storage/log':
                $this->va->delete->storage('log', $data);
                exit;
                break;

            case '/api/v4/email/storage/fail':
                $this->va->delete->storage('fail', $data);
                exit;
                break;
                
                case '/api/v4/email/storage/success':
                    $this->va->delete->storage('success', $data);
                exit;
                break;

                case '/api/v4/email/storage/cron/log':
                    $this->va->notImplemented();
                exit;
                break;
                case '/api/v4/verification/storage/log':
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
