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
        $detail = booklist::wheredate('waktu_Pinjam_Mulai','>=',$dtcurr)->wheredate('waktu_Pinjam_Mulai','<=',$dttmrw)->where('id_Ruangan',$idroom)->where('status','!=',"DONE")->where('status','!=',"CANCELLED")->orderBy('waktu_Pinjam_Mulai','asc')->get();
        $info = room::where('id',$idroom)->first();
        //dd($detail);  
        return view('pages.detailRoom',compact('detail','info'));
    }

    public function cancel($id){
    	$lists = booklist::where('id',$id)->first();
        $ruangan = room::where('id',$lists->id_Ruangan)->first();
        $ruangan->status_now="FREE";
        $lists->status="CANCELLED";
        $ruangan->save();
        $lists->save();
        return back();
    }

    public function submit($id,$pin){
    	$check = booklist::where('id',$id)->first();
    	if($check->PIN==$pin){
    		$ruangan = room::where('id',$check->id_Ruangan)->first();
    		$ruangan->status_now="BOOKED";
            $check->status = "IN PROGRESS";
            $check->save();
    		$ruangan->save();
    		return back();
    	}
    	else {
    		return back()->with('alert-success','Gagal');
    	}
    }
}
