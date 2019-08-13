<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mastertime;
use Auth;
class MasterTimeController extends Controller
{
    //

    public function update(Request $request){
        if(Auth::check()){
          $input = mmastertime::where('id',1)->first();
          $data = $this->validate($request, [
              'time'=>'required',
              ]);
          $input->masterMinute=$data['time'];
          $input->save();

          return redirect('/adminXmeetingYroomZhome');  
        }
        return redirect('/');
    }
}
