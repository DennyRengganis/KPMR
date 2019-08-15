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
        return view('pages.masterConf');
      }
      return redirect('/');
    }
    public function updatetime(Request $request){
        if(Auth::check()){
          $config = config::first();
          $data = $this->validate($request, [
              'time'=>'required',
              ]);
          $config->booklists_timeout=$data['time'];
          $config->save();
          return redirect('/admin/masterconfig');  
        }
        return redirect('/');
    }
}
