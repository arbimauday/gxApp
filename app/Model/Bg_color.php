<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bg_color extends Model
{
    protected $table = 'bg_colors';
    public $fillable = [
        'clr_name','clr_class'
    ];
    protected $primaryKey = 'id_color';
    public $timestamps = false;
}
