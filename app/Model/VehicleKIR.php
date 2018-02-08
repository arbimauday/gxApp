<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VehicleKIR extends Model
{
    protected $table = 'vehicle_kirs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicleId','ownerName','ownerAddress','periodicTestNumber'
    ];
    public $timestamps = false;
}
