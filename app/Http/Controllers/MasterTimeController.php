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
    
}
