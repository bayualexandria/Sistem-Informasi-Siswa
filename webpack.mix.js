const mix = require('laravel-mix');

mix
  .js('app/Views/components/js/app.js', 'public/assets/js')
  .react()
  .postCss('app/Views/components/css/app.css', 'public/assets/css', [
    require('tailwindcss'),
  ]);