<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class MasterTimeController extends Controller
{
    //

    public function update(Request $request){
        if(Auth::check()){
          $config = mastertime::first();
          $data = $this->validate($request, [
              'time'=>'required',
              ]);
          $config->booklists_timeout=$data['time'];
          $config->save();
          return redirect('/admin/home');  
        }
        return redirect('/');
    }
}
