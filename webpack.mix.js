const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.setPublicPath('./public')
  .js('views/js/app.js', 'public/js')
  .sourceMaps()
  .sass('views/sass/app.scss', 'public/css')
  .sourceMaps()
  .options({
    processCssUrls: false,
    postCss: [tailwindcss()],
  })
  .browserSync()
  .version();
