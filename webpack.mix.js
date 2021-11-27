let mix = require('laravel-mix');

mix.js([
    'resources/components/app.js'
],

'public/js')

.sass('resources/css_intranet/app.scss', 'public/css');