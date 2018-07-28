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

return $res;
```
