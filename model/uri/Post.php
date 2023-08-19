<?php

declare(strict_types=1);

namespace email\model\uri;

class Post extends Base
{
    public function process($url, $data): void
    {
        $this->va->firstCheck($data);

        switch ($url) {
            case '/api/v2/email/send':
                $this->va->post->send($data);
                exit;
                break;

            case '/api/v2/email/bucket/send':
                // $this->va->post->sendBucket($data);
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v2/email/bucket/cron':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v2/email/cron':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v2/verification/send':
                $this->va->notImplemented();
                exit;
                break;

            case '/api/v2/verification/bucket/send':
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
