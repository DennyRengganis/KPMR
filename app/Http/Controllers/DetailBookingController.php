<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\booklist;
use App\room;

class DetailBookingController extends Controller
{
    public function viewbook($idroom){
    	$current=Carbon::now();
    	$dtcurr=$current->toDateString();
    	$tomorrow = Carbon::now()->addDay();
    	$dttmrw= $tomorrow->toDateString();
        $detail = booklist::wheredate('waktu_Pinjam_Mulai','>=',$dtcurr)->wheredate('waktu_Pinjam_Mulai','<=',$dttmrw)->where('id_Ruangan',$idroom)->get();
        dd($detail);  
        return view('',compact('detail'));
    }

    public function cancel($id){
    	$lists = booklist::where('id',$id)->first();
        $lists->delete();
        return redirect('');
    }

    public function submit($id,$pin){
    	$check = $lists = booklist::where('id',$id)->first();
    	if($check->PIN==$pin){
    		$ruangan = room::where('id',$check->id_Ruangan)->first();
    		$ruangan->status_now="BOOKED";
    		$ruangan->save();
    		return redirect('');
    	}
    	else {
    		return redirect('');
    	}
    }
}
