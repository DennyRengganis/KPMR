<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building;
use Illuminate\Support\Facades\Validator;

class BuildingController extends Controller
{
    //
    public function AddBuilding(Request $request){

    	$validator = Validator::make($request->all(), [
    		'nama_gedung' =>'required',
    		'jumlah_lantai'=>'required',
    	]);

    	if($validator->fails()){
    		return response()->json(['status' => 'failed',]);
    	}

    	$newBuilding = new building();
    	$newBuilding->nama_gedung = $request->nama_gedung;
    	$newBuilding->jumlah_lantai= $request->jumlah_lantai;
    	$newBuilding->save();


    	return redirect
    }

    public function ShowAll(Request $request){
        $liat = room::all()->sortBy('id');  
        return view('pages.homePage',compact('liat'));
    }

    
}
