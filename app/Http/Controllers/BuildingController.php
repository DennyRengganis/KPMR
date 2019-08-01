<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;

class BuildingController extends Controller
{
    //
    public function view(){
        $liat = building::all()->sortBy('id');  
        return view('pages.homePage',compact('liat'));
    }
    public function create(){
        return view('');
    }
    public function store(Request $request){
        $input = new building();
        $data = $this->validate($request, [
            'nama_gedung'=>'required',
            'jumlah_lantai'=>'required',
            ]);
        $input->nama_gedung=$data['nama_gedung'];
        $input->jumlah_lantai=$data['jumlah_lantai'];
        $input->save();

        return redirect('');
    }
    public function updatepick($id){
        $rooms = building::where('id',$id)->first();
        if ($rooms != null){
            return view('',compact('building'));
        }
        else return redirect('');
    }

    public function update($id,Request $request){
        $input = building::where('id',$id)->first();
        $data = $this->validate($request, [
            'nama_gedung'=>'required',
            'jumlah_lantai'=>'required',
            ]);
        $input->nama_gedung=$data['nama_gedung'];
        $input->jumlah_lantai=$data['jumlah_lantai'];
        $input->save();

        return redirect('');
    }

    public function delete($id){
        $rooms = building::where('id',$id)->first();
        $rooms->delete();
        return redirect('');
    }

    
}
