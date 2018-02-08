let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
.sass('resources/assets/sass/app.scss', 'public/css');

/***************************************************************************/
mix.js('resources/assets/js/client/masterVehicle/app.js', 'public/js/masterVehicle/vehicle.js');

mix.js('resources/assets/js/client/reportError/app.js', 'public/js/clientMain/reportData.js'); // report data for admin and user

mix.js('resources/assets/js/client/webCam/app.js', 'public/webCam/app.js'); // web cam

mix.js('resources/assets/js/client/barCode/qrcodeReader/app.js', 'public/barCodeWebCam/qrcodeReader.js'); // qrbar code reader

mix.js('resources/assets/js/client/masterWebcam/app.js', 'public/js/clientMain/masterWebcam/barcode.js');

mix.js('resources/assets/js/client/monitoring/checkingError/app.js', 'public/js/monitoring/checkingError.js');

mix.version();