<?php

namespace App\Http\Controllers\OtherPart;

use App\Model\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionData extends Controller
{
    public function apiGetData(Request $request){
        $division = Division::all();
        $data = [];
        foreach ($division as $u){
            $dataJson = [
              'id'          => $u->id,
              'division'    => $u->name
            ];
            array_push($data,$dataJson);
        }
        return response()->json(['division' => $data]);
    }
}
