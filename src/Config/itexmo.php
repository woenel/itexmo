<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | iTextMo API Code
    |--------------------------------------------------------------------------
    | 
    | API Code of your iTexMo account.
    |
    | This package would not work unless you provide a valid API code with enough iTexMo outbound credits.
    | API Code can be found on MyApiCodePortal under Profile page labeled 'ApiCode'.
    | Or you can simply visit this link (sign in required): https://itexmo.com/MyApiCode/Profile.php
    |
    */

    'api_code' => env('ITEXMO_API_CODE', ''),

    /*
    |--------------------------------------------------------------------------
    | Verify SSL
    |--------------------------------------------------------------------------
    | 
    | Describes the SSL certificate verification behavior of a request.
    |
    | Set to true to enable SSL certificate verification and use the default CA bundle provided by operating system.
    | Set to false to disable certificate verification (this is insecure!).
    | Set to a string to provide the path to a CA bundle to enable verification using a custom certificate.
    |
    */
   
    'ssl_verify' => env('ITEXMO_SSL_VERIFY', false)
    
];
