<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\room;
use App\booklist;
use App\config;
use App\building;
use App\Http\Requests\BookingFormRequest;
use Mail;
use Carbon\Carbon;

class BookingFormController extends Controller
{
    //
	public function BookRoom(BookingFormRequest $request){
		

        $config = config::first();
        $interval = $config->booklists_timeout;
		// dd($interval);
		$validator = $request->validated();
		$booklist = booklist::where('id_Ruangan', $request['id_Ruangan'])->where('status', '!=', 'CANCELLED')->get();
		
		$mulai=new Carbon($request['waktu_Pinjam_Mulai']);
		$selesai=new Carbon($request['waktu_Pinjam_Selesai']);

		// dd($mulai, $selesai, $interval->masterMinute);
		$timeout = new Carbon($request['waktu_Pinjam_Mulai']);
		$timeout->addMinutes($interval);

		$mulai->second=0;
		$selesai->second=0;
		
		// dd($mulai, $selesai, $timeout);

		$timeout = $timeout->toDateTimeString();
		$request['waktu_Pinjam_Mulai']= $mulai->toDateTimeString();
		$request['waktu_Pinjam_Selesai']= $selesai->toDateTimeString();
		//dd($request);


		// dd($request['waktu_Pinjam_Mulai'], $request['waktu_Pinjam_Selesai'], Carbon::now()->toDateTimeString());

		if ($request['waktu_Pinjam_Mulai']<= Carbon::now()->toDateTimeString())
		{
			return back()->withErrors(['Tidak bisa pinjam sebelum sekarang']); 
		}

		if ($request['waktu_Pinjam_Mulai']>=$request['waktu_Pinjam_Selesai'] || $request['waktu_Pinjam_Selesai'] < $timeout)
		{
			return back()->withErrors(['Waktu pinjam tidak benar']); 
		}


		$waktuPinjamMulai = strtotime($request['waktu_Pinjam_Mulai']);
		$waktuPinjamSelesai = strtotime($request['waktu_Pinjam_Selesai']);

		$checkFlag = True;

		foreach ($booklist as $list) {
						
			$waktuPakaiMulai = strtotime($list->waktu_Pinjam_Mulai);
			$waktuPakaiSelesai = strtotime($list->waktu_Pinjam_Selesai);

			if(($waktuPinjamMulai > $waktuPakaiMulai) && ($waktuPinjamMulai < $waktuPakaiSelesai)){
				return back()->withErrors(['Ruangan terpakai saat waktu tersebut']);
			}

			if(($waktuPinjamSelesai > $waktuPakaiMulai) && ($waktuPinjamSelesai < $waktuPakaiSelesai)){
				return back()->withErrors(['Ruangan terpakai saat waktu tersebut']);
			}

			if(($waktuPakaiMulai > $waktuPinjamMulai) && ($waktuPakaiMulai < $waktuPinjamSelesai)){
				return back()->withErrors(['Ruangan terpakai saat waktu tersebut']);
			}

			if(($waktuPakaiSelesai > $waktuPinjamMulai) && ($waktuPakaiSelesai < $waktuPinjamSelesai)){
				return back()->withErrors(['Ruangan terpakai saat waktu tersebut']);
			}
		}



		if ($checkFlag == True){
			$pinNumber = rand(1,9999);
			$pinText = strval($pinNumber);
			$pinText = str_pad($pinText, 4, '0', STR_PAD_LEFT);

			$input = new booklist();
			$input->id_Ruangan = $request['id_Ruangan'];
			$input->nama = $request['nama'];
			$input->NPK = $request['NPK'];
			$input->email = $request['email'];
			$input->PIN = $pinText;
			$input->waktu_Pinjam_Mulai = $request['waktu_Pinjam_Mulai'];
			$input->waktu_Pinjam_Selesai = $request['waktu_Pinjam_Selesai'];
			$input->waktu_Pinjam_Timeout = $timeout;
			$input->keperluan = $request['keperluan'];
			$input->status = 'WAITING';
			$input->is_deleted = 0;

			$namaRuangan = room::where('id', $request['id_Ruangan'])->first();
			$namaGedung = building::where('id', $namaRuangan->id_gedung)->first();
			//kirim email
			$judul = "Booking Room";
			try{
				Mail::send('email', 
					['nama' => $request['nama'],
					'namaRuangan' => $namaRuangan->nama_ruangan,
					'namaGedung' => $namaGedung->nama_gedung,
					'mulai' => date("D, d/m/y H:i", strtotime($request['waktu_Pinjam_Mulai'])),
					'selesai'=> date("D, d/m/y H:i", strtotime($request['waktu_Pinjam_Selesai'])),
					'npk'=>$request['NPK'],
					'keperluan' => $request['keperluan'],
					'confirmationPIN' => $pinText]
					, function ($message) use ($request)
				{
					$message->subject("Booking Confirmation");
					$message->from(config::get('app.email_address'),config::get('app.email_title'));
					$message->to($request['email']);
				});
			}
			catch (Exception $e){
				return response (['status' => false,'errors' => $e->getMessage()]);
			}
			//dd($input);
			$input->save();
			return back()->with('input',$input);
		}

	}

	public function viewbasic(){
		$gedung=building::all()->sortBy('id');
		return view('pages.bookingRoom',compact('gedung'));
		}

	public function bookwithroom($id){
    	$pickedroom = room::where('id',$id)->first();
    	$pickedbuilding = building::where('id',$pickedroom['id_gedung'])->first();
    	$pickedfloor = $pickedroom['lantai'];
    	$gedung = building::all()->sortBy('id');
    	$roompool = room::where('id_gedung',$pickedroom['id_gedung'])->where('lantai',$pickedfloor)->get();
    	return view('pages.bookingRoom',compact('pickedroom','pickedbuilding','pickedfloor','gedung','roompool'));
    }

    public function bookwithroomdetail($id,$flag){
    	$backflag = $flag;
    	$pickedroom = room::where('id',$id)->first();
    	$pickedbuilding = building::where('id',$pickedroom['id_gedung'])->first();
    	$pickedfloor = $pickedroom['lantai'];
    	$gedung = building::all()->sortBy('id');
    	$roompool = room::where('id_gedung',$pickedroom['id_gedung'])->where('lantai',$pickedfloor)->get();
    	return view('pages.bookingRoom',compact('pickedroom','pickedbuilding','pickedfloor','gedung','roompool','backflag'));
    }

}
