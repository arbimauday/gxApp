<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Report_error extends Model
{
    protected $table = 'report_errors';
    protected $fillable = ['id_user_by','notes','id_notif','id_status','id_send_skype'];
    protected $primaryKey = 'id_report';

    public $timestamps = false;

    public function userGet(){
        return $this->belongsTo(User::class, 'id_user_by', 'id');
    }
}
