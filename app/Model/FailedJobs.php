<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FailedJobs extends Model
{
    protected $table = 'failed_jobs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','connection','queue','payload','exception','failed_at'
    ];
}
