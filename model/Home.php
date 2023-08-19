<?php

declare(strict_types=1);

namespace email\model;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Home
{
    public function async()
    {
        $client = new Client();
        $headers = [];
        $body = json_encode([
            "_auth" => "SZbtWGqgwznG.ifADnGZ/u3pV3OvkNj96IDMnq37A5CMEEt15mH3q",
            "email" => "fabricekulhe@gmail.com",
            "task" => "report"
        ]);
        $request = new Request('GET', 'http://localhost:3000/api/v2', $headers, $body);
        $promise = $client->sendAsync($request);

        // Or, if you don't need to pass in a request instance:
        $promise = $client->requestAsync('GET', 'http://httpbin.org/get');
        $promise->wait();
    } 
}
