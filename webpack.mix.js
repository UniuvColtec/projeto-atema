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

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/bs-stepper/dist/js/bs-stepper.js', 'public/js')
    .copy('node_modules/iziToast/dist/js/iziToast.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
