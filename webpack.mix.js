let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/style.css',
    'public/css/animate.css',
    'public/css/lightslider.css',
    'public/css/lightgallery.css'
], 'public/css/app.css');


if (mix.inProduction()) {
    mix.version();
}