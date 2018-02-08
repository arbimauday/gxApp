<?php

namespace App\Http\Controllers\MasterVehicle;

use App\Model\VehicleKIR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleKIRController extends Controller
{
    public function updateData(Request $request){
        $updateKir = VehicleKIR::where('vehicleId',$request['id'])->first();
        if($updateKir){
            $updateKir->vehicleId           = $request['id'];
            $updateKir->ownerName           = !is_null(ucwords($request['ownerName']))?ucwords($request['ownerName']):'';
            $updateKir->ownerAddress        = !is_null($request['ownerAddress'])?$request['ownerAddress']:'';
            $updateKir->periodicTestNumber  = !is_null($request['periodicTestNumber'])?$request['periodicTestNumber']:'';
            $updateKir->save();
        }else{
            $updateKir = VehicleKIR::create([
               'vehicleId'              => $request['id'],
               'ownerName'              => !is_null(ucwords($request['ownerName']))?ucwords($request['ownerName']):'',
                'ownerAddress'          => !is_null($request['ownerAddress'])?$request['ownerAddress']:'',
                'periodicTestNumber'    => !is_null($request['periodicTestNumber'])?$request['periodicTestNumber']:''
            ]);
        }
        return response()->json($updateKir);
    }
}
