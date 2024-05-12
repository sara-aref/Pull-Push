const mix = require('laravel-mix');

require('dotenv').config(); // Load environment variables

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .webpackConfig({
       plugins: [
           new webpack.DefinePlugin({
               'process.env': {
                   PUSHER_APP_KEY: JSON.stringify(process.env.PUSHER_APP_KEY),
                   PUSHER_APP_CLUSTER: JSON.stringify(process.env.PUSHER_APP_CLUSTER)
               }
           })
       ]
   });
