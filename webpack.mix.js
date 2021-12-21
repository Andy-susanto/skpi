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
    .vue()
    .postCss('resources/css/app.css','public/css',[
        require('tailwindcss'),
    ])
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/front/css/bootstrap.min.css',
    'public/front/css/themify-icons.css',
    'public/front/css/magnific-popup.css',
    'public/front/css/animate.css',
    'public/front/css/owl.carousel.css',
    'public/front/css/style.css',
],'public/front/css/front.css');

mix.scripts([
    'public/front/js/jquery-3.2.1.min.js',
    'public/front/js/owl.carousel.min.js',
    'public/front/js/bootstrap.min.js',
    'public/front/js/main.js',
],'public/front/js/front.js');
