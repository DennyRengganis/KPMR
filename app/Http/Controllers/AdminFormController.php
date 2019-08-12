<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\booklist;
use App\room;
use App\building;

class AdminFormController extends Controller
{
  public function viewall(){
        //$ruangan = room::all()->sortBy('id');
        $gedung = building::all()->sortBy('id');
        return view('pages.dashboardAdminBuildingRoom',compact('gedung'));

    }   
}
