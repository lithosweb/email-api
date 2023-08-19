<?php

declare(strict_types=1);

namespace email\model;

class Json {
    public function message(int $code, string $rule, string $message): void
    {
        http_response_code($code);
        echo json_encode([
            'rule' => $rule,
            'code' => $code,
            'message' => $message
        ], JSON_PRETTY_PRINT);
    }
}