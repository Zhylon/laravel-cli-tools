<?php

namespace Zhylon\LaravelCliTools\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zhylon\LaravelCliTools\LaravelCliTools
 */
class LaravelCliTools extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Zhylon\LaravelCliTools\LaravelCliTools::class;
    }
}
