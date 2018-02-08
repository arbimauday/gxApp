<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VehicleSTNK extends Model
{
    protected $table = 'vehicle_stnks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicleId','brand','assemblyYear','chassisNo','machineNo','modelType','fuel','color','validDate'
    ];
    public $timestamps = false;
}
