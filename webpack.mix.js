let mix = require('laravel-mix');
let from = 'resources/assets/js/client/';
let to = 'public/js/clientMain/';

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
mix.js( from + 'masterVehicle/app.js', to + 'masterVehicle/vehicle.js');

mix.js( from + 'reportError/app.js', to + 'reportData.js'); // report data for admin and user

mix.js( from + 'webCam/app.js', to + 'webCam/app.js'); // web cam

mix.js( from + 'barCode/qrcodeReader/app.js', to + 'barCodeWebCam/qrcodeReader.js'); // qr bar code reader

mix.js( from + 'masterWebcam/app.js', to + 'masterWebcam/barcode.js');

mix.js( from + 'monitoring/checkingError/app.js', to + 'monitoring/checkingError.js');

mix.js( from + 'employee/medicalRecords/app.js',to + 'employee/medicalRecords.js');

mix.js( from + 'test/scrolling/app.js', to + 'test/vue/scrolling-loading.js'); // test

mix.js( from + 'email/app.js', to + 'email/email.js');

mix.version();