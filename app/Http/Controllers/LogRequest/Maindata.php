<?php

namespace App\Http\Controllers\LogRequest;

use App\Model\LogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Maindata extends Controller
{
    // tried input
    public function input(){
        $data = LogRequest::create([
           'causer' =>  'Arbi',
           'via'    =>  'Web',
            'causerIPAdress'    => '127.0.1.0',
            'subject'   => 'Read TimeSheet',
            'action'    => 'ready',
            'level' => 3,
            'description'   => 'Checking data sheets',

        ]);
        return 'Success!';
    }

    // get list data
    public function getData(request $request){
        // Star Convert date
        $whereDate =  \Carbon\Carbon::parse($request->get('whereDate'));
        $starttoday = $whereDate->format('Y-m-d 00:00:01');
        $endtoday   = $whereDate->format('Y-m-d 23:59:59');
        // End Convert date

        $dataWhere = LogRequest::where('created_at', '>=', $starttoday)->where('created_at', '<=', $endtoday)->orderBy('id','DESC');
        $convertJson = [];
        $no = $dataWhere->count();
        foreach ($dataWhere->get() as $uv){
            $dataJson =
                '<tr><td>'.$no.'</td><td>'.$uv->causer.'</td><td>'.$uv->via.'</td><td>'.$uv->causerIPAdress.'</td><td>'.$uv->subject.'</td><td>'.$uv->action.'</td><td>'.$uv->level.'</td><td>'.$uv->description.'</td><td>'.$uv->created_at.'</td></tr>'
            ;
            $no -=1;
            array_push($convertJson,$dataJson);
        }

        return response()->json($convertJson);
    }
}
