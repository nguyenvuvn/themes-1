<?php namespace ABENEVAUT\Themes\App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ThemeFacade
 * @package ABENEVAUT\Themes\App\Facades
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
