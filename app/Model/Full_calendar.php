<?php

namespace App\Model;


use App\User;
use App\Model\Bg_color;
use Illuminate\Database\Eloquent\Model;

class Full_calendar extends Model
{
    protected $table = 'full_calendars';
    public $timestamps = false;

    public $fillable = ['id_user','title','start','end','id_color','created_at','update_at'];

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function bg_color(){
        return $this->belongsTo(Bg_color::class, 'id_color', 'id_color');
    }
}
