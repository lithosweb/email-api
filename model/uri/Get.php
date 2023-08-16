<?php

declare(strict_types=1);

namespace email\model\uri;

use email\helpers\Env_;

class Get extends Base
{
    public function process($data = [])
    {
        if ($data == null) {
            $this->notFound();
        }
        if (! array_key_exists('email', $data)) {
            $this->notFound();
        }
        if (!array_key_exists('task', $data)) {
            $this->notFound();
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
        $task = 'welcome';
        break;
}
        $z = $this->s->sendEmail($data['email'], $task);
        echo json_encode(['message' => $z]);
        return $z;
    }
}
