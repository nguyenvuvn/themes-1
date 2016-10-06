<?php namespace CVEPDB\Themes\App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ThemeFacade
 * @package CVEPDB\Themes\App\Facades
 */
class ThemeFacade extends Facade
{

    /**
     * Get Facade Accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'themes';
    }

}
