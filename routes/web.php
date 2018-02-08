<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Jobs\CalendarJob;
use App\Jobs\ReportJob;
use App\Jobs\SendEmailJob;
use App\Jobs\VehicleJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/temp/login');
});

Auth::routes(); // login
Route::get('/api/listUser', 'User_data@listUser'); // list user

/********** DATA FULL CALENDAR ********/
Route::get('/calendar/full', 'Full_calendar\Data@index'); // view page
Route::get('/api/calendar/full/getDate/{id_user}', 'Full_calendar\Data@api_getDate'); // api data
Route::get('/api/calendar/full/getDate/holiday', 'Full_calendar\Data@api_getDate'); // api data
Route::get('/api/calendar/full/update_pull', 'Full_calendar\Data@api_update_pull'); // update pull
Route::get('/api/calendar/full/form_update', 'Full_calendar\Data@api_form_update'); // update form
Route::get('/api/calendar/full/add_data', 'Full_calendar\Data@api_add_data'); // add data
/********** END DATA FULL CALENDAR ********/

/********* START REPORT ERROR ********/
Route::get('/report/data/for-admin', 'ReportErrorController@data_for_admin'); // view page Report for admin
Route::patch('api/report/admin/update/{id}/{idsts}', 'ReportErrorController@update_sts'); // admin update status report
Route::get('api/report/admin/getdata', 'ReportErrorController@api_list_report'); // list report form admin
Route::post('/api/report/send', 'ReportErrorController@send'); // user send report
Route::get('api/report/user/getdata', 'ReportErrorController@UserReport'); //
Route::get('/report/data/for-user', 'ReportErrorController@data_for_user'); // view page Report for user
/********* END REPORT ERROR ********/

/********* START DIVISION ********/
Route::get('/api/division/getData','OtherPart\DivisionData@apiGetData');
/********* END DIVISION ********/

/********* START MASTER VEHICLE ********/
Route::get('/masterVehicle/motorcycle', function () {
    return view('pages/masterVehicle/motocycle');
});
Route::get('/masterVehicle/car', function () {
    return view('pages/masterVehicle/car');
});
Route::post('/api/masterVehicle/addVehicle', 'MasterVehicle\MasterVehicleController@addVehicle');
Route::get('/api/masterVehicle/getListVehicle', 'MasterVehicle\MasterVehicleController@getData');
Route::get('/api/masterVehicle/viewDetail', 'MasterVehicle\MasterVehicleController@viewDetail');
Route::post('/api/masterVehicle/updateInfo', 'MasterVehicle\MasterVehicleController@updateInfo');
Route::post('/api/vehicleInsurances/updateData', 'MasterVehicle\VehicleInsurancesController@updateData');
Route::post('/api/vehicleStnk/updateData', 'MasterVehicle\VehicleSTNKController@updateData');
Route::post('/api/vehicleKir/updateData','MasterVehicle\VehicleKIRController@updateData');
Route::get('/api/vehicleImg/getData','MasterVehicle\VehicleImageController@getData');
Route::post('/api/vehicleImg/add', 'MasterVehicle\VehicleImageController@add');
/********* END MASTER VEHICLE ********/

/********* WEB CAM EXAMPLE ********/
Route::get('/webCamUp', function(){
   return view('pages/webCam/index');
});
Route::get('/qrcodeReader', function (){
    return view('pages.barCode.qrcodeReader.index');
});

/********* MASTER USING WEB CAM ********/
Route::get('/masterWebcam/barcode', function (){ // Barcode
    return view('pages/masterWebcam/barcode');
});
Route::get('/masterWebcam/scanFace', function(){ // Scan Face
    return view('pages/masterWebcam/scanFace');
});

Route::post('/api/masterWebcam/addData', 'Webcam\Main@apiAddData');

Route::get('/api/masterWebcam/getData', 'Webcam\Main@apiGetData');



/********* RUNNING QUEUES JOBS ********/
Route::get('/jobs/queues/sendEmail', function (){
    $job = (new SendEmailJob())->onQueue('sendEmail')->delay(Carbon::now()->addSeconds(10));
    dispatch($job);
    return 'Email is Send Properly';
});
Route::get('/jobs/queues/calendar', function (){
    $jobs = (new CalendarJob())->onQueue('Calendar')->delay(Carbon::now()->addSeconds(10));
    dispatch($jobs);
    return 'Checking Job Calendar';
});
Route::get('/jobs/queues/report', function (){
    $job = (new ReportJob())->onQueue('Report')->delay(Carbon::now()->addSeconds(10));
    dispatch($job);
    return 'Checking Job Report';
});
Route::get('/jobs/queues/vehicle', function (){
    $job = (new VehicleJob())->onQueue('Vehicle')->delay(Carbon::now()->addSeconds(10));
    dispatch($job);
    return 'Checking Job Vehicle';
});

Route::get('/jobs/queues/retry',function(){
    $id = $_GET['id'];
    $times = Carbon::now()->addSeconds(10);
    $queue= $_GET['queue'];
    if($id){
        Artisan::call('queue:listen',['id'=>$id,'--queue'=>$queue]);
    }else{
        Artisan::call('queue:listen',['--queue'=>$queue]);
    }
});
Route::get('/jobs/queues/delete', 'Monitoring\CheckingErrorJob@deleteJobs');


Route::get('/failedJobs/queues/delete', function (){
    $id     = $_GET['id'];
    if($id){
        Artisan::call("queue:forget",['id'=>[$id]]);
    }else{
        Artisan::call("queue:flush");
    }
});
Route::get('/failedJobs/queues/retry', function (){
    $id = $_GET['id'];
    if($id){
        $queue  = $_GET['queue'];
        Artisan::call("queue:retry",['id' => [$id], Carbon::now()->addSeconds(10)]);
        echo 'Retry ID : '.$id;
    }else{
        Artisan::call("queue:retry",['id' => ['all'],Carbon::now()->addSeconds(10)]);
        echo 'Retry All';
    }
});



/********* MONITORING ********/
Route::get('/monitoring/checkingJobs', function (){
    return view('pages/monitoring/checkingJobs');
});
Route::get('/api/monitoring/checkingJobs/jobs/getData', 'Monitoring\CheckingErrorJob@getDataJobs');
Route::get('/api/monitoring/checkingJobs/failedJobs/getData', 'Monitoring\CheckingErrorJob@getDataFailedJobs');


/********* LOG REQUEST ********/
Route::get('/logRequest', function(){ // data view log request
    return view('pages/logRequest/mainData');
});
Route::get('/logRequest/input','LogRequest\Maindata@input');

Route::get('/api/logRequest/viewdata','LogRequest\Maindata@getData');