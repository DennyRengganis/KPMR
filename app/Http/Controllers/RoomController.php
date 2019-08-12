<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;

class RoomController extends Controller
{
    public function view(){
        $list = room::all()->sortBy('id');  
        return view('',compact('list'));
    }
    public function create(){
        return view('');
    }
    public function store(Request $request){
        $input = new room();
        $data = $this->validate($request, [
            'nomor'=>'required',
            'gedung'=>'required',
            'lantai'=>'required',
            ]);
        $input->nomor=$data['nomor'];
        $input->gedung=$data['gedung'];
        $input->lantai=$data['lantai'];
        $input->status_now="FREE";
        $input->save();

        return redirect('');
    }
    public function updatepick($id){
        $rooms = room::where('id',$id)->first();
        if ($rooms != null){
            return view('',compact('rooms'));
        }
        else return back();
    }

    public function update(Request $request){
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

        return redirect('');
    }

    public function delete(Request $request){
        $rooms = room::where('id',$request['id'])->first();
        if ($rooms != null){
             $rooms->delete();
        } 
        return back();
    }

}
