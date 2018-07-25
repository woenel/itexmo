<?php

namespace Woenel\Itexmo\Facades;

use Illuminate\Support\Facades\Facade;

class Itexmo extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'Itexmo';
    }
}