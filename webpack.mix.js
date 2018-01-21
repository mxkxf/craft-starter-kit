require('dotenv').config();

const mix = require('laravel-mix');

mix.setPublicPath('public')
    .js('assets/js/app.js', 'build/js')
    .sass('assets/sass/app.scss', 'build/css')
    .version()
    .browserSync(process.env.APP_URL);
