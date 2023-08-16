<?php

declare(strict_types=1);

namespace email\mail;

class Send
{
    public Zungvi $z;
    public Gmail $g;

    public function __construct()
    {
        $this->z = new Zungvi;
        $this->g = new Gmail;
    }
    public function sendEmail($to, $subj): bool
    {
        $z = $this->z->send($to, $subj);
        if ($z == true) {
            self::SuccessResponse();
            self::success($to, 'Zungvi', $z);
            return $z;
        } else {
            self::failResponse();
            self::fail($to, 'Zungvi', $z);
        }

        $g = $this->g->send($to, $subj);
        if ($g == true) {
            self::SuccessResponse();
            self::success($to, 'Gmail', $g);
            return $g;
        } else {
            self::failResponse();
            self::fail($to, 'Gmail', $g);
        }
        return $g;
    }

    public static function fail($to,$message, $domain)
    {
        $path = __DIR__ . '/../storage/draft.json';
        $data = json_decode(file_get_contents($path), true);
        $data[ 'draft_' . (string) time()] = 
        [
            'email' => $to, 
            'message' => $message,
            'domain' => $domain, 
            'hour' => date('H:i:s'), 
            'date' => date('d-F-Y')
        ];
        return file_put_contents($path, json_encode($data));
    }

    public static function success($to, $message, $domain)
    {
        $path = __DIR__ . '/../storage/sent.json';
        $data = json_decode(file_get_contents($path), true);
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

    public static function SuccessResponse(){
        http_response_code(201);
        echo json_encode([
            'rule' => 'Created',
            'code' => 201,
            'message' => 'Message sent'
        ], JSON_PRETTY_PRINT);
        exit;
    }

    public static function failResponse(){
        http_response_code(202);
        echo json_encode([
            'rule' => 'Accepted',
            'code' => 202,
            'message' => 'Message not sent, retry in a while'
        ], JSON_PRETTY_PRINT);
        exit;
    }
}
