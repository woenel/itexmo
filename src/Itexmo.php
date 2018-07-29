<?php

namespace Woenel;

use GuzzleHttp\Client;

class Itexmo
{
    private $client;
    
    public $to;
    public $message;
    public $result;
    
    public function __construct()
    {
        $this->client = new Client;
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
        
        $this->result = $res->getBody()->getContents();

        return $this->result;
    }
}
