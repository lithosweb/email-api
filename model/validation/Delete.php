<?php

declare(strict_types=1);

namespace email\model\validation;

class Delete extends Base
{
    public function storage($dir, $data): void
    {
        if (!array_key_exists('file', $data)) {
            $this->json->message(401, 'Unauthorized', 'No file included');
            exit;
        }
        if (!is_string($data['file'])) {
            $this->json->message(401, 'Unauthorized', 'Enter a valid filename');
            exit;
        }
        $file = (string) $data['file'];
        $path = __DIR__ . '/../../storage/' . $dir;
        $data = (array) scandir($path);
        if (($data == false) || (count($data) == 2)) {
            $this->json->message(404, 'Not found', 'No file here');
            exit;
        }
        if (in_array($file, $data)) {
            unlink($path . '/' . $file);
        } else {
            $this->json->message(404, 'Not found', 'No file with that name');
            exit;
        }
        $this->json->message(200, 'OK', 'File deteted');
        exit;
    }
}
