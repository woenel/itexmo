# iTexMo
iTexMo API for Laravel.

![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg)

## Installation

Install using Composer
```
$ composer require woenel/itexmo
```

Publish the config file named `itexmo.php` and set the iTexMo API code.
```
$ php artisan vendor:publish --provider="Woenel\Itexmo\ItexmoServiceProvider"
```

## Usage

#### Sending a message
```
use Itexmo;

$res = Itexmo::to('09123456789')->message('Hello World!')->send();

if($res == '0') {
  // Success message or logic. Refer to the return codes below.
}
```

## Return codes

"0" = Success! Message is now on queue and will be sent soon.
"1" = Invalid number.
"2" = Number prefix not supported. Please contact us so we can add.
"3" = Invalid ApiCode.
"4" = Maximum Message per day reached. This will be reset every 12:00AM.
"5" = Maximum allowed characters for message reached.
"6" = System offline.
"7" = Expired ApiCode.
"8" = iTexMo Error. Please try again later.
"9" = Invalid function parameters.
"10" = Recipient's number is blocked due to flooding, message was ignored.
"11" = Recipient's number is blocked temporarily due to hard sending and the message was ignored.
"12" = Invalid request. You can't set message priorities on non corporate apicodes.
"13" = Invalid or not registered custom sender ID.