<?php

namespace App\Http\Controllers\MasterVehicle;

use App\Model\VehicleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterVehicle;

class MasterVehicleController extends Controller{

    public function addVehicle(Request $request){
        $data = MasterVehicle::create([
            'vehicleTypeId'     => $request['vehicleTypeId'],
            'plateNumber'       => strtoupper($request['plateNumber']),
            'managerId'         => '0',
            'divisionId'        => $request['divisionId'],
            'portId'            => '0',
            'vehicleStateId'    => '0',
            'purchasedDate'     => !is_null($request['purchasedDate'])?$request['purchasedDate']:'',
            'receivedDate'      => !is_null($request['receivedDate'])?$request['receivedDate']:'',
            'vehicleStatusId'   => '0',
            'kilometerData'     => !is_null($request['kilometerData'])?$request['kilometerData']:'',
            'outOrNotId'        => '0'
        ]);
        return response()->json($data);
    }

    public function getData(Request $request){ //get data all with vehicleTypeId
        $data = MasterVehicle::where('vehicleTypeId',$request->get('vehicleTypeId'))->orderby('plateNumber', 'asc')->get();
        $convertJson = [];
        foreach ($data as $gt){
            $dataJson = [
                'id'            => $gt->id,
                'plateNumber'   => $gt->plateNumber,
                'modelType'     => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->modelType:'Empty',
                'division'      => !is_null($gt->division)?$gt->division->name:'Empty',
                'color'         => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->color:'Empty',
                'fuel'          => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->fuel:'Empty'
            ];
            array_push($convertJson,$dataJson);
        }
        return response()->json(['dataVehicle' => $convertJson]);
    }

    public function viewDetail(Request $request){
        $data = MasterVehicle::where('id',$request->get('id'))->get();
        $jsonInfo = []; // this is data from DB master vehicle
        $jsonStnk = []; // this is data from DB master vehicle join with vehicle STNK
        $jsonInsurances = []; // this is data from DB master vehicle join with vehicle Insurances
        $jsonKir = []; // this is data from DB master vehicle join with vehicle KIR

        foreach ($data as $gt){
            $convertInfo = [
                'plateNumber'   => $gt->plateNumber,
                'division'      => !is_null($gt->division)?$gt->division->name:'',
                'divisionId'    => $gt->divisionId,
                'purchasedDate' => $gt->purchasedDate,
                'receivedDate'  => $gt->receivedDate,
                'kilometerData' => $gt->kilometerData
            ];
            array_push($jsonInfo,$convertInfo);

            $convertStnk = [
                'brand'         => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->brand:'',
                'assemblyYear'  => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->assemblyYear:'',
                'chassisNo'     => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->chassisNo:'',
                'machineNo'     => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->machineNo:'',
                'modelType'     => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->modelType:'',
                'fuel'          => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->fuel:'',
                'color'         => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->color:'',
                'validDate'     => !is_null($gt->vehicleStnk)?$gt->vehicleStnk->validDate:''
            ];
            array_push($jsonStnk,$convertStnk);

            $convertInsurances = [
                'name'      => !is_null($gt->vehicleInsurance)?$gt->vehicleInsurance->name:'',
                'dueDate'   => !is_null($gt->vehicleInsurance)?$gt->vehicleInsurance->dueDate:'',
                'nominal'   => !is_null($gt->vehicleInsurance)?$gt->vehicleInsurance->nominal:''
            ];
            array_push($jsonInsurances,$convertInsurances);

            $convertKir = [
                'ownerName'             => !is_null($gt->vehicleKir)?$gt->vehicleKir->ownerName: '',
                'ownerAddress'          => !is_null($gt->vehicleKir)?$gt->vehicleKir->ownerAddress: '',
                'periodicTestNumber'    => !is_null($gt->vehicleKir)?$gt->vehicleKir->periodicTestNumber: '',
                'chekingUseOrNot'       => !is_null($gt->vehicleTypeId)?$gt->vehicleTypeId: '' // Checking the use of DB KIR (CAR or MOTORCYCLE)
            ];
            array_push($jsonKir,$convertKir);
        }

        $dataImg = VehicleImage::where('vehicleId',$request->get('id'))->orderby('id', 'decs')->paginate(5);
        $imgJson = [];
        foreach ($dataImg as $u){
            $dataConvert = [
                'id'        => !is_null($u->vehicleId)?$u->vehicleId:'',
                'image'     => !is_null($u->vehicleId)?$u->image:'',
                'src'       => !is_null($u->vehicleId)?'../imgVehicle/'.$u->image:'',
                'caption'   => !is_null($u->vehicleId)?$u->description:''
            ];
            array_push($imgJson,$dataConvert);
        }

        return response()->json([
            'dataInfo'          => $jsonInfo,
            'dataStnk'          => $jsonStnk,
            'dataInsurances'    => $jsonInsurances,
            'dataKir'           => $jsonKir,
            'images'            => $imgJson
        ]);
    }

    public function updateInfo(Request $request){
        $updateInfo = MasterVehicle::find($request['id']);
        $updateInfo->plateNumber    = strtoupper($request['plateNumber']);
        $updateInfo->divisionId     = !is_null($request['divisionId'])?$request['divisionId']:'';
        $updateInfo->purchasedDate  = $request['purchasedDate'];
        $updateInfo->receivedDate   = $request['receivedDate'];
        $updateInfo->kilometerData  = $request['kilometerData'];
        $updateInfo->save();
        return response()->json([$updateInfo]);
    }

}
