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
        $detail = booklist::wheredate('waktu_Pinjam_Mulai',$dtcurr)->where('id_Ruangan',$idroom)->where('status','!=',"DONE")->where('status','!=',"CANCELLED")->orderBy('waktu_Pinjam_Mulai','asc')->get();
        $besok = booklist::wheredate('waktu_Pinjam_Mulai',$dttmrw)->where('id_Ruangan',$idroom)->where('status','!=',"DONE")->where('status','!=',"CANCELLED")->orderBy('waktu_Pinjam_Mulai','asc')->get();
        $info = room::where('id',$idroom)->first();
        //dd($detail);  
        return view('pages.detailRoom',compact('detail','info','besok'));
    }

    public function viewbook2($idroom){
        $current=Carbon::now();
        $dtcurr=$current->toDateString();
        $tomorrow = Carbon::now()->addDay();
        $dttmrw= $tomorrow->toDateString();
        $detail = booklist::wheredate('waktu_Pinjam_Mulai',$dtcurr)->where('id_Ruangan',$idroom)->where('status','!=',"DONE")->where('status','!=',"CANCELLED")->orderBy('waktu_Pinjam_Mulai','asc')->get();
        $besok = booklist::wheredate('waktu_Pinjam_Mulai',$dttmrw)->where('id_Ruangan',$idroom)->where('status','!=',"DONE")->where('status','!=',"CANCELLED")->orderBy('waktu_Pinjam_Mulai','asc')->get();
        $info = room::where('id',$idroom)->first();
        //dd($detail);  
        return view('pages.detailRoom_2',compact('detail','info','besok'));
    }

    public function cancel(Request $request){
    	$lists = booklist::where('id',$request['id'])->first();
        $pin=sprintf("%s%s%s%s",$request['pin1'],$request['pin2'],$request['pin3'],$request['pin4']);
        if($lists->PIN==$pin){
            $ruangan = room::where('id',$lists->id_Ruangan)->first();
            $ruangan->status_now="FREE";
            $lists->status="CANCELLED";
            $ruangan->save();
            $lists->save();
            return back();
        }
        else {
            return back()->withErrors('PIN Salah');
        }
    }

    public function confirm(Request $request){
    	$check = booklist::where('id',$request['id'])->first();
        $pin=sprintf("%s%s%s%s",$request['pin1'],$request['pin2'],$request['pin3'],$request['pin4']);
        if($check->waktu_Pinjam_Timeout <= Carbon::now()->toDateString){
            return back()->withErrors('anda Telat');
        }

    	if($check->PIN==$pin){
    		$ruangan = room::where('id',$check->id_Ruangan)->first();
    		$ruangan->status_now="BOOKED";
            $check->status = "IN PROGRESS";
            $check->save();
    		$ruangan->save();
    		return back();
    	}
    	else {
    		return back()->withErrors('PIN Salah');
    	}
    }
}
