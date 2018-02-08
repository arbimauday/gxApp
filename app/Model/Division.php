<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;
}
