<?php

declare(strict_types=1);

namespace email\model\validation;

class Post extends Base
{
    public function send($data): bool
    {
        if (!array_key_exists('email', $data)) {
            $this->json->message(401, 'Unauthorized', 'No email included');
            exit;
        }
        if (!array_key_exists('task', $data)) {
            $this->json->message(401, 'Unauthorized', 'No task included');
            exit;
        }
        switch ($data['task']) {
            case 'welcome':
                $task = 'welcome';
                break;

            case 'password':
                $task = 'password';
                break;

            case 'report':
                $task = 'report';
                break;

            default:
                $this->json->message(404, 'Not found', 'Wrong task, fix and retry');
                exit;
                break;
        }
        return $this->send->sendEmail($data['email'], $task);
    }

    public function sendBucket($data): bool
    {
        if (!array_key_exists('email', $data)) {
            $this->json->message(401, 'Unauthorized', 'No email included');
            exit;
        }
        if (!array_key_exists('task', $data)) {
            $this->json->message(401, 'Unauthorized', 'No task included');
            exit;
        }
        switch ($data['task']) {
            case 'welcome':
                $task = 'welcome';
                break;

            case 'password':
                $task = 'password';
                break;

            case 'report':
                $task = 'report';
                break;

            default:
                $this->json->message(404, 'Not found', 'Wrong task, fix and retry');
                exit;
                break;
        }
        if (is_string($data['email'])) {
            return $this->send->sendEmail(to: $data['email'], subj: $task);
        }
        if (is_array($data['email']) && (count($data['email']) == 1)) {
            foreach ($data['email'] as $key => $value) {
                $bool = $this->send->sendEmail($value, $task);
            }
            return $bool;
        }
        if (is_array($data['email']) && (count($data['email']) >= 2)) {
            foreach ($data['email'] as $key => $value) {
                $bool = $this->send->sendEmail($value, $task);
            }
            return $bool;
        }
        return false;
    }
}
