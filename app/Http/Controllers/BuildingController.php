<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;

class BuildingController extends Controller
{
    public function view(){
        $list = building::all()->sortBy('id');  
        return view('',compact('list'));
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
        $buildings = building::where('id',$id)->first();
        if ($buildings != null){
            return view('',compact('buildings'));
        }
        else return back();
    }

    public function update(Request $request){
        $input = building::where('id',$request['id'])->first();
        $data = $this->validate($request, [
            'nama_gedung'=>'required',
            'jumlah_lantai'=>'required',
            ]);
        $input->nama_gedung=$data['nama_gedung'];
        $input->jumlah_lantai=$data['jumlah_lantai'];
        $input->save();

        return redirect('');
    }

    public function delete(Request $request){
        $buildings = building::where('id',$request['id'])->first();
        if ($buildings != null){
             $buildings->delete();
        }       
        return back();
    }

    
}
