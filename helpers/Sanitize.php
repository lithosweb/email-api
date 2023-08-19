<?php

declare(strict_types=1);

namespace email\helpers;

use email\helpers\Helpers;

class Sanitize implements Helpers
{
    public static function get($data): mixed
    {
        if (is_string($data)) {
            return filter_var($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if (is_array($data)) {
            return filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if (is_bool($data)) {
            return (bool) $data;
        }
        if (is_int($data)) {
            return (int) $data;
        }
        if (is_float($data)) {
            return (float) $data;
        }
        if (is_null($data)) {
            return (string) $data;
        }
    }
}
