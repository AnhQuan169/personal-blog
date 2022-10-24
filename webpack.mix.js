const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


// User
mix.js('resources/js/app.js', 'public/js')
    .copyDirectory('resources/assets/user/images', 'public/storage/images')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
