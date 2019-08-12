<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booklist;
use App\room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class scheduleController extends Controller
{

	public function FromWaitingToNeedConfirmation()
	{

		// DB::enableQueryLog();	
		$roomWaitingLists = booklist::where('waktu_Pinjam_Mulai', '<=', Carbon::now()->toDateTimeString())->where('status', 'WAITING')->pluck('id_ruangan')->toArray();

		$booklistsNeedConfirmation = booklist::where('waktu_Pinjam_Mulai', '<=', Carbon::now()->toDateTimeString())->where('status', 'WAITING')->update(['status'=>'NEED CONFIRMATION']);

		$roomWaiting = room::wherein('id', $roomWaitingLists)->update(['status_now'=>'WAITING']);

		// dd(DB::getQueryLog());
	}

	public function FromNeedConfirmationToCancelled()
	{
		$roomFreeLists = booklist::where('waktu_Pinjam_Mulai', '<=', DB::raw('waktu_Pinjam_Timeout'))->where('status', 'NEED CONFIRMATION')->pluck('id_ruangan')->toArray();

		$booklistsCancelled = booklist::where('waktu_Pinjam_Mulai', '<=', DB::raw('waktu_Pinjam_Timeout'))->where('status', 'NEED CONFIRMATION')->update(['status'=>'CANCELLED']);

		$roomFree = room::wherein('id', $roomFreeLists)->update(['status_now'=>'FREE']);
	}

	public function FromInProgressToDone(){

		$roomFreeLists = booklist::where('waktu_Pinjam_Selesai', '<=', Carbon::now()->toDateTimeString())->where('status','IN PROGRESS')->pluck('id_ruangan')->toArray();

		$booklistsDone = booklist::where('waktu_Pinjam_Selesai', '<=', Carbon::now()->toDateTimeString())->where('status','IN PROGRESS')->update(['status'=>'DONE']);

		$roomFree = room::wherein('id', $roomFreeLists)->update(['status_now' => 'FREE']);
	}

}
