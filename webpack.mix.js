const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.postCss('resources/css/app.css', 'public/css');

mix.options({
    postCss: [
        require('postcss-import'),
        require('tailwindcss'),
        // require('autoprefixer'),
    ],
});

mix.browserSync({
    proxy: 'http://localhost:8000/',
});
