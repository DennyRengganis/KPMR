<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;

class RoomController extends Controller
{
    public function view(){
        $liat = room::all()->sortBy('id');  
        return view('pages.homePage',compact('liat'));
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
        else return redirect('');
    }

    public function update($id,Request $request){
        $input = room::where('id',$id)->first();
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

    public function delete($id){
        $rooms = room::where('id',$id)->first();
        $rooms->delete();
        return redirect('');
    }

    public function viewrooms(){
        $roomtype = 3;
        #dd($liat);
        return view('pages.roomPage',compact('roomtype'));
    }
}
