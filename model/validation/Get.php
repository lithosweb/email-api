<?php

declare(strict_types=1);

namespace email\model\validation;

class Get extends Base
{
    public function history($file = 'log'): void
    {
        $path = __DIR__ . '/../../storage/' . $file . '.json';
        $data = file_get_contents($path);
        if ($data == false) {
            $data = '{}';
        }
        echo $data;
        exit;
    }

    public function storage($dir = 'log'): void
    {
        $path = __DIR__ . '/../../storage/' . $dir;
        $data = (array) scandir($path);
        if (($data == false) || (count($data) == 2)) {
            $this->json->message(404, 'Not found', 'No backup until here');
            exit;
        }
        array_shift($data);
        array_shift($data);
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }
}
