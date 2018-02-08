<?php

namespace App\Http\Controllers\Full_calendar;
use App\Model\Bg_color;
use App\Model\Full_calendar;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Data extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = User::all();
        $color = Bg_color::all();
        return view('pages/calendar/full_calendar', compact('user','color'));
    }

    public function api_getDate(Request $request){
        $data = [];
        $datacol = explode(',', $request->id_color); // convert number like (2,3) to number array ('2','3')
        $getDate = Full_calendar::where('id_user', 'LIKE',"$request->id_user%")
            ->Where(function ($query) use($datacol) { // multi or where with query in where
                for ($i = 0; $i < count($datacol); $i++){
                    $query->orwhere('id_color', 'like', "$datacol[$i]%");
                }
            })->get();

        foreach ($getDate as $u){
            $import = [
              'id'=> $u->id,
              'id_user' => $u->id_user,
              'user'=> $u->user->name,
              'title'=> $u->user->name.': '.$u->title,
              'title_edit' => $u->title,
              'start'=> $u->start,
              'end' => $u->end,
              'className' => $u->bg_color->clr_class,
              'id_color'  => $u->id_color
            ];
            array_push($data,$import);
        }
        return $data;
    }

    public function api_update_pull(Request $request){
        $up = Full_calendar::find($request->get('id'));
        $up->start   = $request->get('start');
        $up->end     = $request->get('end');
        $up->save();
        return response()->json('OK');
    }

    public function api_form_update(Request $request){
        $del = $request->get('delete');
        $id  = $request->get('id');
        if (isset($del) && isset($id)){
            Full_calendar::where('id',$id)->delete();
            return response()->json('DEL');
        }else{
            $up = Full_calendar::find($request->get('id'));
            $up->title   = $request->get('title');
            $up->id_color   = $request->get('classname');
            $up->save();
            return response()->json($del);
        }
    }

    public function api_add_data(Request $request){
        $data = Full_calendar::create([
            'id_user' => $request->get('id_user'),
            'title'   => $request->get('title'),
            'start'   => $request->get('start'),
            'end'     => $request->get('end'),
            'id_color' => $request->get('classname')
        ]);
        return response()->json($data);
    }

    // data vue js
    public function userList(){
        $user = User::all();
        return $user;
    }

    public function colorList(){
        $color = Bg_color::all();
        return $color;
    }

}
