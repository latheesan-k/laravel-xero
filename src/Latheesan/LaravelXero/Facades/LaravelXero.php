<?php namespace Latheesan\LaravelXero\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelXero extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'xero'; }
}
