<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\booklist;
use App\room;
use App\config;
use App\building;
use App\User;
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

    public function adminhome(){
    	if(Auth::check()){
    		$booklists = booklist::leftJoin('rooms','booklists.id_Ruangan','=','rooms.id')
                        ->leftJoin('buildings','rooms.id_gedung','=','buildings.id')
                        ->select('booklists.*','rooms.nama_ruangan as room_nama','buildings.nama_gedung as building_nama','rooms.lantai as room_lantai')
                        ->where('booklists.is_deleted',0)
                        ->paginate(1);
    		return view('pages.dashboardAdminBookList',compact('booklists'));
    	}
        else return redirect('/');
    }

    public function admintime(){
    	if(Auth::check()){
            $config = config::first();
            $booklists_timeout = $config->booklists_timeout; 
        	return view('pages.Form.formTime',compact('booklists_timeout'));
    	}
        else return redirect('/');
    }

    public function adminuser(){
        if(Auth::user()->status=="admin"){
            $list = User::all()->sortBy('id');  
            return view('pages.Form.formSU',compact('list'));
        }
        else return redirect('/');
    }
}
