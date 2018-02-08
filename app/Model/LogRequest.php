<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogRequest extends Model
{
    //
    protected $table = 'logRequest';
    protected $primaryKey = 'id';

    public $timestamps = true;
    public $fillable = [
        'causer','via','causerIPAdress','subject','action','level','description',''
    ];
}
