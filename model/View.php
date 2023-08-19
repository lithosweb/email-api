<?php

declare(strict_types=1);

namespace email\model;

class View implements Model
{

    public static function getHtml($html = 'welcome'): string
    {
        ob_start();
        require_once __DIR__ . '/../view/html/' . $html . '.php';
        return (string) ob_get_clean();
    }

    public static function getLayout($layout = '_main'): string
    {
        ob_start();
        require_once __DIR__ . '/../view/layout/' . $layout . '.php';
        return (string) ob_get_clean();
    }

    public static function renderEcho($html = 'welcome', $layout = '_main'): void
    {
        $htm = self::getHtml($html);
        $layou = self::getLayout($layout);
        echo str_replace('{{content}}', $htm, $layou);
        exit;
    }

    public static function renderPrint($html = 'welcome', $layout = '_main'): string
    {
        $htm = self::getHtml($html);
        $layou = self::getLayout($layout);
        return (string) str_replace('{{content}}', $htm, $layou);
    }
}
