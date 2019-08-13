<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\booklist;
use App\room;
use App\building;
use Auth;

class AdminFormController extends Controller
{
  public function viewall(){
        //$ruangan = room::all()->sortBy('id');
  		if(Auth::check()){
  			$gedung = building::all()->sortBy('id');
        return view('pages.dashboardAdminBuildingRoom',compact('gedung'));

  		}
        else return redirect('/');
    }   
}
