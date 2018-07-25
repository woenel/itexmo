<?php

namespace Woenel\Itexmo;

use GuzzleHttp\Client;

class Itexmo {

    private $client;
    private $to;
    private $message;
    
    public function __construct()
    {
        $this->client = new Client;
    }

    public function test($asd)
    {
        return $asd;
    }

    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        $vars = [
            'form_params' => [
                '1' => $this->to,
                '2' => $this->message,
                '3' => config('itexmo.api_code')
            ],
            'verify' => config('itexmo.verify')
        ];

        $res = $this->client->post('https://www.itexmo.com/php_api/api.php', $vars);

        return $res->getBody()->getContents();
    }
    
}