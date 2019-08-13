<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\building;
use Auth;

class RoomController extends Controller
{
    public function view(){
        if(Auth::check()){
            $list = room::all()->sortBy('id');  
            return view('dashboardAdminBuildingRoom',compact('list'));
        }
        else return redirect('/');
    }
    public function create(){
        if(Auth::check()){
            $gedungcreate= building::all()->sortBy('id');
            return view('pages.Form.formRuangan',compact('gedungcreate'));
        }
        else return redirect('/');
    }
    public function createhere($id_building,$lantai){
        if(Auth::check()){
            $buildings = building::where('id',$id)->first();
            return view('pages.Form.formRuangan',compact('buildings','lantai'));
        }
        else return redirect('/');
    }
    public function store(Request $request){
        if(Auth::check()){
            $input = new room();
            $data = $this->validate($request, [
                'nomor'=>'required',
                'id_gedung'=>'required',
                'lantai'=>'required',
                ]);
            $input->nomor=$data['nomor'];
            $input->id_gedung=$data['id_gedung'];
            $input->lantai=$data['lantai'];
            $input->status_now="FREE";
            $input->save();

            return redirect('/adminXmeetingYroomZhome');
        }
        else return redirect('/');
    }
    public function updatepick($id){
        if(Auth::check()){
           $rooms = room::leftJoin('buildings','rooms.id_gedung','=','buildings.id')
                        ->select('rooms.*','buildings.nama_gedung as building_nama','buildings.id as building_id')
                        ->where('rooms.id',$id)->first();
           dd($rooms);
           if ($rooms != null){
               return view('pages.Form.formRuangan',compact('rooms'));
           }
           else return back(); 
        }
        else return redirect('/');
    }

    public function update(Request $request){
        if(Auth::check()){
            $input = room::where('id',$request['id'])->first();
            $data = $this->validate($request, [
                'nomor'=>'required',
                'gedung'=>'required',
                'lantai'=>'required',
                ]);
            $input->nomor=$data['nomor'];
            $input->gedung=$data['gedung'];
            $input->lantai=$data['lantai'];
            $input->status_now=$data['status_now'];
            $input->save();

            return redirect('/adminXmeetingYroomZhome');
        }
        else return redirect('/');
    }

    public function delete(Request $request){
        if(Auth::check()){
           $rooms = room::where('id',$request['id'])->first();
        if ($rooms != null){
             $rooms->delete();
        } 
        return back(); 
        }
        else return redirect('/');
    }

}
