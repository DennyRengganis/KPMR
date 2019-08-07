<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\room;
use App\booklist;
use App\building;
use App\Http\Requests\BookingFormRequest;
use Mail;
use Carbon\Carbon;

class BookingFormController extends Controller
{
    //
	public function BookRoom(BookingFormRequest $request){
		
		$validator = $request->validated();
		$booklist = booklist::where('id_Ruangan', $request['id_Ruangan'])->get();
		
		$mulai=new Carbon($request['waktu_Pinjam_Mulai']);
		$selesai=new Carbon($request['waktu_Pinjam_Selesai']);
		$mulai->second=0;
		$selesai->second=0;
		$request['waktu_Pinjam_Mulai']= $mulai->toDateTimeString();
		$request['waktu_Pinjam_Selesai']= $selesai->toDateTimeString();
		//dd($request);

		$waktuPinjamMulai = strtotime($request['waktu_Pinjam_Mulai']);
		$waktuPinjamSelesai = strtotime($request['waktu_Pinjam_Selesai']);

		$checkFlag = True;

		foreach ($booklist as $list) {
						
			$waktuPakaiMulai = strtotime($list->waktu_Pinjam_Mulai);
			$waktuPakaiSelesai = strtotime($list->waktu_Pinjam_Selesai);

			if(($waktuPinjamMulai >= $waktuPakaiMulai) && ($waktuPinjamMulai <= $waktuPakaiSelesai)){
				$checkFlag = False;
			}

			if(($waktuPinjamSelesai >= $waktuPakaiMulai) && ($waktuPinjamSelesai <= $waktuPakaiSelesai)){
				$checkFlag = False;
			}

			if(($waktuPakaiMulai >= $waktuPinjamMulai) && ($waktuPakaiMulai <= $waktuPinjamSelesai)){
				$checkFlag = False;
			}

			if(($waktuPakaiSelesai >= $waktuPinjamMulai) && ($waktuPakaiSelesai <= $waktuPinjamSelesai)){
				$checkFlag = False;
			}

			if ($checkFlag == False){
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
			$input->keperluan = $request['keperluan'];
			$input->status = 'WAITING';

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
					// 'BookingID' =>$request['id'],
					'confirmationPIN' => $pinText]
					, function ($message) use ($request)
				{
					$message->subject("BookingRoom");
					$message->to($request['email']);
				});
			}
			catch (Exception $e){
				return response (['status' => false,'errors' => $e->getMessage()]);
			}
			//dd($input);
			$input->save();
			return back()->withErrors('Terimakasih, booking sudah dikonfirmasi');
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
