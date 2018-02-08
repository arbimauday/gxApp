<?php

namespace App\Http\Controllers\Monitoring;

use App\Model\FailedJobs;
use App\Model\Jobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class checkingErrorJob extends Controller
{
    public function getDataJobs(){
        //$data = Jobs::all();
        $data = Jobs::orderBy('id', 'Desc')->get();
        return response()->json($data);
    }

    public function getDataFailedJobs(){
        $data = FailedJobs::orderBy('id','Desc')->get();
        return response()->json($data);
    }

    public function deleteJobs(Request $request){
        $id = $request->get('id');
        if($id){
            Jobs::where('id', $id)->delete();
            return response()->json('True ID Delete');
        }else{
            Jobs::truncate();
            return response()->json('True All');
        }
    }
}
