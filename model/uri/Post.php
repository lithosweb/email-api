<?php

declare(strict_types=1);

namespace email\model\uri;

class Post extends Base
{
    public function process($data = [])
    {
        if ($data == null) {
            return $this->notFound();
        }

if (! array_key_exists('_auth', $data)) {
    http_response_code(401);
    echo json_encode([
        'rule' => 'Unauthorized',
        'code' => 401,
        'message' => 'No authentication detected'
    ], JSON_PRETTY_PRINT);
    exit;  
}

if (! password_verify( 'authentication', '$2y$10$' . $data['_auth'])) {
    http_response_code(401);
    echo json_encode([
        'rule' => 'Unauthorized',
        'code' => 401,
        'message' => 'Wrong authentication key'
    ], JSON_PRETTY_PRINT);
    exit;
}

        if (!array_key_exists('email', $data)) {
            http_response_code(401);
            echo json_encode([
                'rule' => 'Unauthorized',
                'code' => 401,
                'message' => 'No email included'
            ], JSON_PRETTY_PRINT);
            exit;
        }
        if (!array_key_exists('task', $data)) {
            http_response_code(401);
            echo json_encode([
                'rule' => 'Unauthorized',
                'code' => 401,
                'message' => 'No task included'
            ], JSON_PRETTY_PRINT);
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
                http_response_code(404);
                echo json_encode([
                    'rule' => 'Not found',
                    'code' => 404,
                    'message' => 'Wrong task included'
                ], JSON_PRETTY_PRINT);
                exit;
                break;
        }
        $z = $this->s->sendEmail($data['email'], $task);
        echo json_encode(['message' => $z]);
        return $z;
    }
}
