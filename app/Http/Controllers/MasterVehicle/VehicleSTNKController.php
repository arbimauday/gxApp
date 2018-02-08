<?php

namespace App\Http\Controllers\MasterVehicle;

use App\Model\VehicleSTNK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleSTNKController extends Controller
{
    public function updateData(Request $request){
        $updateStnk = VehicleSTNK::where('vehicleId',$request['id'])->first();
        if($updateStnk){
            $updateStnk->vehicleId  = $request['id'];
            $updateStnk->brand      = !is_null(ucwords($request['brand']))?ucwords($request['brand']): '';
            $updateStnk->assemblyYear   = !is_null($request['assemblyYear'])?$request['assemblyYear']: '';
            $updateStnk->chassisNo      = !is_null($request['chassisNo'])?$request['chassisNo']: '';
            $updateStnk->machineNo      = !is_null($request['machineNo'])?$request['machineNo']: '';
            $updateStnk->modelType      = !is_null(ucwords($request['modelType']))?ucwords($request['modelType']): '';
            $updateStnk->fuel           = !is_null($request['fuel'])?$request['fuel']: '';
            $updateStnk->color          = !is_null($request['color'])?$request['color']: '';
            $updateStnk->validDate      = !is_null($request['validDate'])?$request['validDate']: '';
            $updateStnk->save();
        }else{
            $updateStnk = VehicleSTNK::create([
                'vehicleId'     => $request['id'],
                'brand'         => !is_null(ucwords($request['brand']))?ucwords($request['brand']): '',
                'assemblyYear'  => !is_null($request['assemblyYear'])?$request['assemblyYear']: '',
                'chassisNo'     => !is_null($request['chassisNo'])?$request['chassisNo']: '',
                'machineNo'     => !is_null($request['machineNo'])?$request['machineNo']: '',
                'modelType'     => !is_null(ucwords($request['modelType']))?ucwords($request['modelType']): '',
                'fuel'          => !is_null($request['fuel'])?$request['fuel']: '',
                'color'         => !is_null($request['color'])?$request['color']: '',
                'validDate'     => !is_null($request['validDate'])?$request['validDate']: ''
            ]);
        }
        return response()->json($updateStnk);
    }
}
