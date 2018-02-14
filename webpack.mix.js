let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/style.css',
    'public/css/animate.css',
    'public/css/lightslider.css',
    'public/css/lightgallery.css'
], 'public/css/app.css');

mix.styles([
    'public/assets/css/bootstrap.min.css',
    'public/assets/css/admin.css',
    'public/assets/css/animate.min.css',
    'public/assets/css/uikit.min.css',
    'public/assets/css/sweetAlert.min.css',
    'public/assets/css/perfect-scrollbar.min.css'
], 'public/assets/css/app.css');

if (mix.inProduction()) {
    mix.version();
}