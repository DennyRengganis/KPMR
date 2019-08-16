<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\config;
class ConfigController extends Controller
{
    //
    public function view(){
      if(Auth::check()){
        $config = config::all()->sortBy('id');
        return view('pages.masterConf',compact('config'));
      }
      return redirect('/');
    }

    public function create(){
        if(Auth::check()){
           return view('pages.Form.formConfig'); 
        }
        else return redirect('/');
    }

    public function store(Request $request){
      if(Auth::check()){
        $config = new config();
        $data = $this->validate($request, [
              'key'=>'required',
              'value'=>'required',
              ]);
          $config->key=$data['key'];
          $config->value=$data['value'];
          $config->save();
          return redirect('/admin/masterconfig');  
      }
      return redirect('/');
    }
    public function update(Request $request){
        if(Auth::check()){
          $config = config::where('key',$request['key'])->first();
          $data = $this->validate($request, [
              'value'=>'required',
              ]);
          $config->value=$data['value'];
          $config->save();
          return redirect('/admin/masterconfig');  
        }
        return redirect('/');
    }

    public function updatepick($id){
        if(Auth::check()){
           $config = config::where('id',$id)->first();
           if ($config != null){
               return view('',compact('config'));
           }
           else return back(); 
        }
        else return redirect('/');
    }

    
}
