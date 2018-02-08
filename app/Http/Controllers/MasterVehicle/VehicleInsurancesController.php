<?php

namespace App\Http\Controllers\MasterVehicle;

use App\Model\VehicleInsurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleInsurancesController extends Controller
{
    public function updateData(Request $request){
        $updateInsurances = VehicleInsurance::where('vehicleId',$request['id'])->first();
        if($updateInsurances){
            $updateInsurances->vehicleId    = $request['id'];
            $updateInsurances->name         = !is_null(ucwords($request['name']))?ucwords($request['name']): '';
            $updateInsurances->dueDate      = !is_null($request['dueDate'])?$request['dueDate']: '';
            $updateInsurances->nominal      = !is_null($request['nominal'])?$request['nominal']: '0';
            $updateInsurances->save();
        }else{
            $updateInsurances = VehicleInsurance::create([
                'vehicleId' => $request['id'],
                'name'      => !is_null(ucwords($request['name']))?ucwords($request['name']): '',
                'dueDate'   => !is_null($request['dueDate'])?$request['dueDate']: '',
                'nominal'   => !is_null($request['nominal'])?$request['nominal']: '0'
            ]);
        }
        return response()->json($updateInsurances);
    }
}
