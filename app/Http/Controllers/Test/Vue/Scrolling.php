<?php

namespace App\Http\Controllers\Test\Vue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Scrolling extends Controller
{
    public function index(){
        return view('pages/test/vue/scrolling-loading/index');
    }
}