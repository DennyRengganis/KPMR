<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AdminController extends Controller
{
    //
    public function view(){
        if(Auth::user()->status=="admin"){
            $list = User::all()->sortBy('id');  
            return view('',compact('list'));
        }
        else return redirect('/adminXmeetingYroomZhome');
    }
    public function create(){
        return view('');
    }
    public function store(Request $request){
        if(Auth::user()->status=="admin"){
            $input = new User();
            $data = $this->validate($request, [
                'username'=>'required',
                'password'=>'required',
                'status'=>'required',
                ]);
            $input->username=$data['nama_gedung'];
            $input->password=Hash::make($data['password']);
            $input->status=$data['status'];
            $input->save();

            return back()->withSuccess("Berhasil Menambah Akun");
        }
        else return redirect('/adminXmeetingYroomZhome');
    }
    public function updatepick($id){
        if(Auth::user()->status=="admin"){
            $users = User::where('id',$id)->first();
            if ($users != null){
                return view('',compact('users'));
            }
            else return back();
        }
        else return redirect('/adminXmeetingYroomZhome');
    }

    public function update(Request $request){
        if(Auth::user()->status=="admin"){
            $input = User::where('id',$request['id'])->first();
            $data = $this->validate($request, [
                'username'=>'required',
                'password'=>'required',
                'status'  =>'required',
                ]);
            $input->username=$data['nama_gedung'];
            $input->password=Hash::make($data['password']);
            $input->status=$data['status'];
            $input->save();

            return back()->withSuccess("Berhasil Mengubah Akun");
        }
        else return redirect('/adminXmeetingYroomZhome');
    }

    public function delete(Request $request){
        if(Auth::user()->status=="admin"){
           $users = User::where('id',$request['id'])->first();
           if ($users != null){
                $users->delete();
           }       
           return back()->withSuccess("Berhasil Menghapus Akun"); 
        }
        else return redirect('/adminXmeetingYroomZhome');
    }
}
