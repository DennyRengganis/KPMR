<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;

class RoomController extends Controller
{
    public function create(Request $request){
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
    public function view(){
        $liat = room::all()->sortBy('id');
        #dd($liat);
        return view('pages.homePage',compact('liat'));
    }
    public function update(){
        

    }
    public function delete(){
        
    }
    /*testing*/
    public function viewrooms(){
        $roomtype = 3;
        #dd($liat);
        return view('pages.roomPage',compact('roomtype'));
    }
}
