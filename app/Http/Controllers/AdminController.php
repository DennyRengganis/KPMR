<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AdminController extends Controller
{
    //
    public function view(){
        $list = User::all()->sortBy('id');  
        return view('',compact('list'));
    }
    public function create(){
        return view('');
    }
    public function store(Request $request){
        $input = new User();
        $data = $this->validate($request, [
            'username'=>'required',
            'password'=>'required',
            ]);
        $input->username=$data['nama_gedung'];
        $input->password=Hash::make($data['password']);
        $input->status='temp';
        $input->save();

        return back();
    }
    public function updatepick($id){
        $users = User::where('id',$id)->first();
        if ($users != null){
            return view('',compact('users'));
        }
        else return back();
    }

    public function update(Request $request){
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

        return back();
    }

    public function delete(Request $request){
        $users = User::where('id',$request['id'])->first();
        if ($users != null){
             $users->delete();
        }       
        return back();
    }
}
