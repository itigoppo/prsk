const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
        'jquery': ['$', 'window.jQuery'],
    })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/dropzone.js', 'public/js')
    .js('resources/js/front.js', 'public/js')
    .js('resources/js/character-sort.js', 'public/js')
    .js('resources/js/event-calc.js', 'public/js')
    .js('resources/js/interactions.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sourceMaps();
