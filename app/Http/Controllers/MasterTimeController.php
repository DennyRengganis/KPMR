<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mastertime;

class MasterTimeController extends Controller
{
    //
    public function view(){
        $mastertime = mastertime::all()->sortBy('id');  
        return view('',compact('mastertime'));
    }
    public function updatepick($id){
        if(Auth::check()){
            $mastertime = mastertime::where('id',$id)->first();
            if ($mastertime != null){
                return view('',compact('mastertime'));
            }
            else return back();
        }
        else return redirect('/');
    }

    public function update(Request $request){
        if(Auth::check()){
          $input = mastertime::where('id',$request['id'])->first();
          $data = $this->validate($request, [
              'masterMinute'=>'required',
              ]);
          $input->masterMinute=$data['masterMinute'];
          $input->save();

          return redirect('');  
        }
        return redirect('/');
    }
}
