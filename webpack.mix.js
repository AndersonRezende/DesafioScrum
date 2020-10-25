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
	.styles('resources/sass/style.css', 'public/site/style.css')
    .styles('resources/sass/style.css', 'public/site/style.css')
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/site/bootstrap.css')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/site/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/site/bootstrap.js')
    .scripts('resources/js/flash.js', 'public/site/flash.js');
