<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class MasterTimeController extends Controller
{
    //

    public function update(Request $request){
        if(Auth::check()){
          $data = $this->validate($request, [
              'time'=>'required',
              ]);
          Config::set(['booklists_timeout' => $data['time'] ]);
          return redirect('/admin/home');  
        }
        return redirect('/');
    }
}
