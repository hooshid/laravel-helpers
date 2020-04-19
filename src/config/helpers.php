<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Package Helpers
    |--------------------------------------------------------------------------
    |
    | This package comes with some pre-built helpers. Activate the ones
    | you wish to use by selecting them here. Valid options include:
    |
    | formatter, image, string
    |
    */

    'package_helpers' => ['formatter', 'image', 'string'],

    /*
    |--------------------------------------------------------------------------
    | Custom Helpers
    |--------------------------------------------------------------------------
    |
    | You are also encouraged to write your own helpers. If you prefer a
    | mapper based inclusion, you can selectively activate your custom
    | helpers by adding them here. Otherwise all PHP files in the
    | Helpers directory will be automatically loaded.
    |
    */

    'custom_helpers' => [],

    /*
    |--------------------------------------------------------------------------
    | Directory
    |--------------------------------------------------------------------------
    |
    | By default this package will look in the application's 'Helpers'
    | directory. However, you may choose to override the directory.
    |
    */

    'directory' => 'Helpers',

    /*
    |--------------------------------------------------------------------------
    | Default Image
    |--------------------------------------------------------------------------
    |
    | The 'image' helper provides a simple default image when no image is
    | passed to it. Here you can define which image you would like to
    | use as the fallback image. The path is relative to the
    | resource root, or 'public' directory.
    |
    */

    'default_image' => '/images/no-image.jpg',

];
