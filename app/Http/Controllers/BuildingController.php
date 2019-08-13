<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;
use Auth;

class BuildingController extends Controller
{
    public function view(){
        if(Auth::check()){
            $list = building::all()->sortBy('id');  
            return view('',compact('list'));
        }
        else return redirect('/');
    }
    public function create(){
        if(Auth::check()){
           return view('pages.Form.formGedung'); 
        }
        else return redirect('/');
    }
    public function store(Request $request){
        if(Auth::check()){
            $input = new building();
            $data = $this->validate($request, [
                'nama_gedung'=>'required',
                'jumlah_lantai'=>'required',
                ]);
            $input->nama_gedung=$data['nama_gedung'];
            $input->jumlah_lantai=$data['jumlah_lantai'];
            $input->save();

            return redirect('/adminXmeetingYroomZhome');
        }
        else return redirect('/');
    }
    public function updatepick($gedung){
        if(Auth::check()){
            $buildings = building::where('id',$gedung)->first();
            if ($buildings != null){
                return view('pages.Form.formGedung',compact('buildings'));
            }
            else return back();
        }
        else return redirect('/');
    }

    public function update(Request $request){
        if(Auth::check()){
          $input = building::where('id',$request['id'])->first();
          $data = $this->validate($request, [
              'nama_gedung'=>'required',
              'jumlah_lantai'=>'required',
              ]);
          $input->nama_gedung=$data['nama_gedung'];
          $input->jumlah_lantai=$data['jumlah_lantai'];
          $input->save();

          return redirect('/adminXmeetingYroomZhome');  
        }
        else return redirect('/');
    }

    public function delete(Request $request){
        if(Auth::check()){
          $buildings = building::where('id',$request['id'])->first();
          if ($buildings != null){
               $buildings->delete();
          }       
          return back();  
        }
        else return redirect('/');
    }

    
}
