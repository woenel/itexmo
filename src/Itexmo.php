<?php

namespace Woenel;

use GuzzleHttp\Client;

class Itexmo
{
    private $client;
    private $endpoint;

    public $to;
    public $message;
    public $result;
    
    public function __construct()
    {
        $this->client = new Client;
        $this->endpoint = 'https://www.itexmo.com/php_api/';
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
        $res = $this->client->post($this->endpoint . 'api.php', [
            'form_params' => [
                '1' => $this->to,
                '2' => $this->message,
                '3' => config('itexmo.api_code')
            ],
            'verify' => config('itexmo.verify')
        ]);

        $this->result = $res->getBody()->getContents();

        return $this->result;
    }

    public function status()
    {
        $res = $this->client->get($this->endpoint . 'serverstatus.php?apicode=' . config('itexmo.api_code'));
        
        $this->result = json_decode($res->getBody()->getContents())->result;

        $this->result = (object) [
            'api_status'        => $this->result->APIStatus,
            'dedicated_server'  => $this->result->DedicatedServer,
            'gateway_number'    => $this->result->GatewayNumber,
            'sms_server_status' => $this->result->SMSServerStatus
        ];

        return $this->result;
    }

    public function info()
    {
        $res = $this->client->get($this->endpoint . 'apicode_info.php?apicode=' . config('itexmo.api_code'));
        
        $this->result = json_decode($res->getBody()->getContents())->{'Result '};

        $this->result = (object) [
            'api_code'         => $this->result->ApiCode,
            'contact_number'   => $this->result->ContactNumber,
            'max_characters'   => $this->result->MaxCharacters,
            'max_messages'     => $this->result->MaxMessages,
            'messages_left'    => $this->result->MessagesLeft,
            'footer'           => $this->result->Footer,
            'expires_on'       => $this->result->ExpiresOn,
            'dedicated_server' => $this->result->Dedicated,
        ];

        return $this->result;
    }
}