<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','queue','payload','attempts','reserved_at'
    ];
}
