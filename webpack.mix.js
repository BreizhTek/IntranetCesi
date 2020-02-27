let mix = require('laravel-mix');

mix.postCss('ressources/css/main.css', './style.css', [
    require('tailwindcss'),
])