var elixir = require('laravel-elixir');

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

elixir(function (mix) {
    mix.styles([
        "animate.css",
    ], 'public/css/animate.min.css');
    mix.styles([
        "slick.css"
    ], 'public/css/slick.min.css');
    mix.styles([
        "jquery.fullPage.css"
    ], 'public/css/jquery.fullPage.min.css');
    mix.styles([
        "styles.css",
    ], 'public/css/app.css');
    mix.styles([
        "sb-admin-2.css"
    ], 'public/css/admin.css');
    mix.scripts([
        "modernizr.custom.32033.js",
    ], 'public/js/modernizr.custom.32033.min.js');
    mix.scripts([
        "scripts.js"
    ], 'public/js/app.js');
    mix.scripts([
        "sb-admin-2.js",
    ], 'public/js/admin.js');
    mix.phpUnit();
    mix.browserSync({
        proxy: 'votev.com'
    });
});
