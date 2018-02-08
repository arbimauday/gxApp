<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $table = 'vehicle_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicleId','image','description'
    ];
    public $timestamps = false;
}
