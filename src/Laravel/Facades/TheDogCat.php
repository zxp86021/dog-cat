<?php

namespace TheDogCat\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class TheDogCat.
 */
class TheDogCat extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'the-dog-cat';
    }
}