var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
var paths = {
	jquery: './node_modules/jquery/',
    bootstrap: './node_modules/bootstrap-sass/assets/',
    fontawesome: './node_modules/font-awesome/'
};

elixir(function(mix) {
    mix.sass('app.scss');
    // Common JS
    mix.scripts([
        'app.js',
        paths.jquery + "dist/jquery.js",
        paths.bootstrap + 'javascripts/bootstrap.js'
    ], 'public/js/app.js');
    mix.copy(paths.bootstrap + 'fonts/**', 'public/fonts');
    mix.copy(paths.fontawesome + 'fonts/**', 'public/fonts');
    mix.livereload();
});
