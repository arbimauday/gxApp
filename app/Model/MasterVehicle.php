<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\VehicleInsurance;
use App\Model\VehicleKIR;
use App\Model\VehicleSTNK;
use App\Model\Division;


class MasterVehicle extends Model
{
    protected $table = 'master_vehicles';
    protected $primaryKey = 'id';

    public $timestamps = false;
    public $fillable = [
        'vehicleTypeId','plateNumber',
        'managerId','divisionId','portId','vehicleStateId',
        'purchasedDate','receivedDate','vehicleStatusId','kilometerData',
        'outOrNotId'
    ];

    public function vehicleImage(){
        return $this->belongsTo(VehicleImage::class, 'id', 'vehicleId');
    }

    public function vehicleInsurance(){
        return $this->belongsTo(VehicleInsurance::class, 'id', 'vehicleId');
    }

    public function vehicleKir(){
        return $this->belongsTo(VehicleKIR::class, 'id', 'vehicleId');
    }

    public function vehicleStnk(){
        return $this->belongsTo(VehicleSTNK::class, 'id', 'vehicleId');
    }

    public function division(){
        return $this->belongsTo(Division::class, 'divisionId', 'id');
    }

}
