const mix = require('laravel-mix');
const path = require('path');

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
 
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            src: path.join(__dirname, 'resources/js/src')
        }
    }
});

mix.js('resources/js/main.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
