<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VehicleInsurance extends Model
{
    protected $table = 'vehicle_insurances';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicleId','name','dueDate','nominal'
    ];
    public $timestamps = false;
}
