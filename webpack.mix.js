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


// mix.webpackConfig({
//     resolve: {
//         extensions: ['.vue', '.ts', '.js'],
//     },
//     module: {
//         rules: [
//             {
//                 test: /\.vue$/, loader: 'vue-loader',
//                 options: {
//                     loaders: {
//                         ts: 'ts-loader',
//                         tsx: 'babel-loader!ts-loader',
//                     }
//                 }
//             },

//             {
//                 test: /\.ts$/,
//                 loader: 'ts-loader',
//                 exclude: /node_module/,
//                 options: { appendTsSuffixTo: [/\.vue$/] }
//             },
//         ],
//     },
// });
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
mix.js('resources/js/front.js', 'public/js')
    .vue(3)
    .postCss('resources/css/front.css', 'public/css', [
        require("tailwindcss"),
    ])
    .sourceMaps();


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/core.scss', 'public/css')
    .sass('resources/sass/theme-default.scss', 'public/css')
    .sourceMaps();
