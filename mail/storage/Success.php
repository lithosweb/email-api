<?php

declare(strict_types=1);

namespace email\mail\storage;

class Success {
    public function save($to, $message, $domain)
    {
        $path = __DIR__ . '/../../storage/success.json';
        $data = (array) json_decode(file_get_contents($path), true);
        if (count($data) == 100) {
            rename($path, __DIR__ . '/../../storage/success/' . uniqid(prefix: 'success_of_' . date('d-F-Y') . '_') . '.json');
            $data = [];
        }
        $data[ 'sent_' . (string) time()] = 
        [
            'email' => $to, 
            'message' => $message,
            'domain' => $domain, 
            'hour' => date('H:i:s'),
            'date' => date('d-F-Y')
        ];
        return file_put_contents($path, json_encode($data));
    }
}