<?php

declare(strict_types=1);

namespace email\model\uri;

class Get extends Base
{
    public function process($url, $data): void
    {
        $this->va->firstCheck($data);

        switch ($url) {
            case '/api/v1/email/history/log':
                $this->va->get->history();
                exit;
                break;

            case '/api/v1/email/history/success':
                $this->va->get->history(file: 'success');
                exit;
                break;

            case '/api/v1/email/history/fail':
                $this->va->get->history(file: 'fail');
                exit;
                break;

            case '/api/v1/email/storage/log':
                $this->va->get->storage();
                exit;
                break;

            case '/api/v1/email/storage/fail':
                $this->va->get->storage(dir: 'fail');
                exit;
                break;
                
            case '/api/v1/email/storage/success':
                $this->va->get->storage(dir: 'success');
                exit;
                break;

            case '/api/v1/email/history/bucket/log':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v1/email/history/bucket/cron/log':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v1/email/history/cron/log':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v1/verification/history/log':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v1/verification/storage/log':
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
