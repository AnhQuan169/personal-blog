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

 mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json', '.scss', '.png'],
        alias: {
            '@': __dirname + '/resources/assets',
            '~': __dirname + 'node_modules/'
        },
    },
})

// Base
mix.js('resources/assets/base/js/app.js', 'public/js')
    .sass('resources/assets/base/scss/app.scss', 'public/css');

// Admin
mix.js('resources/assets/admin/js/app.js', 'public/admin/js')
    .sass('resources/assets/admin/scss/app.scss', 'public/admin/css')
    .copyDirectory('resources/assets/admin/images', 'public/admin/images')
    .copyDirectory('resources/assets/admin/app-assets', 'public/admin/app-assets')
    .copyDirectory('resources/assets/admin/app-assets/data', 'public/admin/app-assets/data')
    .copyDirectory('resources/assets/admin/LivIconsEvo', 'public/admin/app-assets/fonts/LivIconsEvo')

// Node modules

// User
mix.js('resources/assets/user/js/app.js', 'public/user/js')
    .copyDirectory('resources/assets/user/images', 'public/storage/images')

mix.browserSync('127.0.0.1:8000');
