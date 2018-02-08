<?php

namespace App\Http\Controllers;

use App\Model\Report_error;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // hash for check password

class ReportErrorController extends Controller
{
    public function send(request $data){
        $input_id = $data['id'];
        if(!empty($input_id)){
            //cek user and password
            $dataCekUser = User::find($input_id);
            $cek_pass = Hash::check($data['pass'], $dataCekUser->password);
        }else{
            $input_id = \Auth::user()->id; // get id user from login
            if(!empty($input_id)){
                $cek_pass = true;
            }else{
                $cek_pass = false;
            }
        }
        //return response()->json($data['pass']);

        if($cek_pass){
            Report_error::create([
                'id_user_by' => $input_id,
                'notes' => $data['notes'],
                'id_notif' => 0,
                'id_status' => 0,
                'id_send_skype' => 0
            ]);
            return response()->json(1); // Success input
        }else{
            return response()->json(0); // failed input
        }
    }

    public function  data_for_admin(Request $data){
        $report = Report_error::orderby('created_at', 'desc')->get();
        return view('pages/report_error/for_admin', compact('report'));
    }

    public function data_for_user(Request $data){
        if(!empty(\Auth::user()->id)){
            return view('pages/report_error/for_user', compact('cekLogIn'));
        }else{
            return redirect('/');
        }
    }

    // data for admin
    public function api_list_report(Request $request){
        $getView = Report_error::where('id_status', $request->get('id_status'))->orderby('created_at', 'desc')->get();
        $json_data = [];
        foreach ($getView as $u){
            $data = [
                'id_report' => $u->id_report,
                'notes' => $u->notes,
                'id_status' => $u->id_status,
                'created_at' => $u->created_at,
                'id_user_by' => $u->id_user_by,
                'full_name' => $u->userGet->full_name
            ];
            array_push($json_data,$data);
        }

        // count data report
        $newReport = Report_error::where('id_status', '0')->count();
        $onproReport = Report_error::where('id_status', '1')->count();
        $clearReport = Report_error::where('id_status', '2')->count();


        return response()->json([
            'reportNew' => $json_data,
            'new' => $newReport,
            'onpro' => $onproReport,
            'clear' => $clearReport
        ]);
    }

    // data per user
    public function UserReport(Request $request){
        $idUser = \Auth::user()->id;
        $getData = Report_error::where('id_status', $request->get('id_status'))->where('id_user_by', $idUser)->orderby('created_at', 'desc')->get();
        $json_data = [];
        foreach ($getData as $u){
            $data = [
                'id_report' => $u->id_report,
                'notes' => $u->notes,
                'id_status' => $u->id_status,
                'created_at' => $u->created_at,
                'id_user_by' => $u->id_user_by,
                'full_name' => $u->userGet->full_name
            ];
            array_push($json_data,$data);
        }

        // count data report
        $newReport = Report_error::where('id_status', '0')->where('id_user_by', $idUser)->count();
        $onproReport = Report_error::where('id_status', '1')->where('id_user_by', $idUser)->count();
        $clearReport = Report_error::where('id_status', '2')->where('id_user_by', $idUser)->count();

        return response()->json([
            'userReport' => $json_data,
            'new' => $newReport,
            'onpro' => $onproReport,
            'clear' => $clearReport
        ]);
    }

    public function update_sts(Request $request){
        $getUp = Report_error::find($request->id);
        $getUp->id_status = $request->idsts;
        $getUp->save();
    }

}
