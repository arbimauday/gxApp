<?php

namespace App\Http\Controllers\Webcam;

use App\Model\Webcamdata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Main extends Controller
{

    public function apiAddData(request $request){
        $data = $request['file'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $namePicture = 'Gx'.date('ymdhs').'.jpg';
        $dataConvert = file_put_contents('uploadWebcam/'.$namePicture, $data);

        $inputData = Webcamdata::create([
            'fullName'  => $request['fullName'],
            'email'     => $request['email'],
            'company'   => $request['company'],
            'pictureName'   => $namePicture
        ]);
        return response()->json($dataConvert);
    }

    public function apiGetData(request $request){
        $getData = Webcamdata::all();
        foreach ($getData as $gt){
            $data = [
                'fullName' => $gt->fullName,
                'email' => $gt->email,
                'company' => $gt->company,
                'pictureName' => $gt->pictureName
            ];
        }
        return response()->json($getData);
    }
}
