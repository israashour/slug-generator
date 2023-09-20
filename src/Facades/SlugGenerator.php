<?php

namespace Slg\SlugGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class SlugGenerator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'slug-generator';
    }
}
