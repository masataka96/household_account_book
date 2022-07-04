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
<<<<<<< HEAD
<<<<<<< HEAD
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
=======
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
>>>>>>> a3dc26ba4d37e7b22f203a85b46254264a401ee4
=======
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
>>>>>>> 854bab22770f0ff31524eb8e0308456890a3d3db
