<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Webcamdata extends Model
{
    protected $table = 'webcamdatas';

    public $timestamps = false;
    public $fillable = ['fullName','email','company','pictureName'];
}
