<?php

namespace App\Http\Controllers\MasterVehicle;

use App\Model\VehicleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleImageController extends Controller
{
    public function getData(Request $request){
        $data = VehicleImage::where('vehicleId',$request->get('id'))->orderby('id', 'decs')->get();
        $imgJson = [];
        foreach ($data as $u){
            $dataConvert = [
                'id'    => $u->vehicleId,
                'image' => $u->image,
                'src'   => '../imgVehicle/'.$u->image,
                'caption' => $u->description
            ];
            array_push($imgJson,$dataConvert);
        }
        return response()->json([
            'listImg' => $imgJson
        ]);
    }

    public function add(Request $request){
        $data = $request['file'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $namePicture = 'Vehicle'.date('ymdhs').'.jpg';
        $dataConvert = file_put_contents('imgVehicle/'.$namePicture, $data);

        $input = VehicleImage::create([
            'vehicleId'   => $request['vehicleId'],
            'image'       => $namePicture ,
            'description' => ucwords($request['title'])
        ]);
        return response()->json($dataConvert);
    }
}
