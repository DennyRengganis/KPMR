<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;
use App\room;
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

            return redirect('/admin/building')->withSuccess("Berhasil Menambah Gedung");
        }
        else return redirect('/');
    }
    public function updatepick(Request $request){
        if(Auth::check()){
            $buildings = building::where('id',$request['building'])->first();
            if ($buildings != null){
                return view('pages.Form.formGedung',compact('buildings'));
            }
            else return back();
        }
        else return redirect('/');
    }

    public function updateconfirm(Request $request){
      if(Auth::check()){
        $input = building::where('id',$request['id'])->first();
        $rooms = room::where('id_gedung',$request['id'])
                          ->where('lantai','>=',$request['jumlah_lantai'])
                          ->get();
        foreach($rooms as $rm){
        	$rm->delete();
        }
        $data = $this->validate($request, [
            'nama_gedung'=>'required',
            'jumlah_lantai'=>'required',
            ]);
        $input->nama_gedung=$data['nama_gedung'];
        $input->jumlah_lantai=$data['jumlah_lantai'];
        $input->save();

        return redirect('/admin/building')->withSuccess("Berhasil Mengubah Gedung");  
      }
      else return redirect('/');
    }

    public function update(Request $request){
        if(Auth::check()){
          $input = building::where('id',$request['id'])->first();
          $rooms = room::where('id_gedung',$request['id'])
                          ->where('lantai','>=',$request['jumlah_lantai'])
                          ->get();
          if($rooms!=null){
            $jumlah = (string)count($rooms);
            return back()->withSuccess('terdapat ' + $jumlah ' ruangan pada lantai di atas ' + $request['jumlah_lantai'] + '. Apakah anda yakin mengubah?');
          }
          $data = $this->validate($request, [
              'nama_gedung'=>'required',
              'jumlah_lantai'=>'required',
              ]);
          $input->nama_gedung=$data['nama_gedung'];
          $input->jumlah_lantai=$data['jumlah_lantai'];
          $input->save();

          return redirect('/admin/building')->withSuccess("Berhasil Mengubah Gedung");  
        }
        else return redirect('/');
    }

    public function delete(Request $request){
        if(Auth::check()){
          $buildings = building::where('id',$request['id'])->first();
          if ($buildings != null){
               $buildings->delete();
          }       
          return redirect('/admin/building')->withSuccess("Berhasil Menghapus Gedung");  
        }
        else return redirect('/');
    }

    
}
