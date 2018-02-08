<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class User_data extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function listUser(){ // api user
        $user = User::all();
        return $user;
    }
}
