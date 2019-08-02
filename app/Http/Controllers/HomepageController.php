<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\building;


class HomepageController extends Controller
{
    //

    public function viewall(){
    	//$ruangan = room::all()->sortBy('id');
    	$gedung = building::all()->sortBy('id');
        return view('pages.homePage',compact('gedung'));

    }

    public function myhomeAjax($id)
    {
        $floors = building::where('id',$id)->first();
        return json_encode($floors);
    }

    public function myroomAjax($id,$floor)
    {
        $rooms = room::where('id_gedung',$id)->where('lantai',$floor)->get();
        return json_encode($rooms);
    }

    public function bookwithroom($id){
    	$pickedroom = room::where('id',$id)->first();
    	$pickedbuilding = building::where('id',$pickedroom['id_gedung'])->first;
    	$pickedfloor = $pickedroom['lantai'];
    	$gedung = building::all()->sortBy('id');
    	return view('pages.bookingRoom',compact('pickedroom','pickedbuilding','pickedfloor','gedung'));
    }
}
