[![Build Status](https://travis-ci.org/abenevaut/themes.svg?branch=master)](https://travis-ci.org/abenevaut/themes)

# Laravel 5 Themes

Official documentation is located [here](http://laravel5pingpong.blogspot.fr/2016/08/laravel-5-themes.html)

## Installation

Open your composer.json file, and add the new required package.

    "abenevaut/themes": "5.4.0"
    
Next, open a terminal and run.

    composer update

Next, Add new service provider in config/app.php.

    'ABENEVAUT\Themes\ThemesServiceProvider',
    
Next, Add new aliases in config/app.php.
    
    'Theme' => 'ABENEVAUT\Themes\ThemeFacade',
    
Next, publish the package's assets.

    php artisan vendor:publish

Done.

## Usage

Get all themes.

    Theme::all();
    
Set theme active.

    Theme::set('default');

    Theme::setCurrent('default');

Get current theme active.

    Theme::getCurrent();

Check theme.

    Theme::has('simple')

    Theme::exists('other-theme');

Set theme path.

    $path = public_path('themes');

    Theme::setPath($path);

Get theme path.

    Theme::getThemePath('default');

Get themes path.

    Theme::getPath();

Get view from current active theme.

    Theme::view('index');

    Theme::view('folders.view');

Get translation value from active theme.

    Theme::lang('group.name');

Get theme's config value from active theme.

    Theme::config('filename.key');

    Theme::config('filename.key.subkey');

    Theme::config('filename.key.subkey', 'default value here');

If your theme's config file named config.php, you can get the value of config little bit short.

    Theme::config('key');

    Theme::config('key.subkey');
    
You can also get config value from other theme.

    // current theme
    Theme::config('key');

    // from other theme
    Theme::config('bootstrap::key');

## Artisan Commands

Generate a new theme.

    php artisan theme:make foo
    
Show all available themes.

    php artisan theme:list
    
Cache all themes.

    php artisan theme:cache

Publish all theme's assets from all themes.

    php artisan theme:publish

Publish all theme's assets from the specified theme.

    php artisan theme:publish theme-name
    