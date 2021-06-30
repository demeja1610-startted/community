const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/scripts/main.js', 'public/js')
    .sourceMaps()
    .vue()
    .sourceMaps()
    .browserSync({
        host: process.env.APP_URL,
        proxy: process.env.APP_URL,
    })
    .sass('resources/assets/scss/main.scss', 'public/css')
    .sass('resources/assets/scss/common/bootstrap.scss', 'public/css')
    .sourceMaps()
    .copyDirectory('resources/assets/images', 'public/images')
    .copyDirectory('resources/assets/fonts', 'public/fonts')

mix.js('resources/assets/scripts/admin/main.js', 'public/admin/js')
    .sass('resources/assets/scss/admin/main.scss', 'public/admin/css')
