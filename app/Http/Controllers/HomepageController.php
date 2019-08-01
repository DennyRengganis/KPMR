<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\building;


class HomepageController extends Controller
{
    //

    public function viewall(){
    	$ruangan = room::all()->sortBy('id');
    	$gedung = building::all()->sortBy('id')
        return view('pages.homePage',compact('ruangan', 'gedung'));

    }
}
