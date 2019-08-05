<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\room;
use App\booklist;
use App\building;
use App\Http\Requests\BookingFormRequest;

class BookingFormController extends Controller
{
    //
	public function BookRoom(BookingFormRequest $request){
		
		$validator = $request->validated();
		$booklist = booklist::where('id_Ruangan', $request['id_Ruangan'])->get();
		// dd($request);

		$waktuPinjamMulai = date(strtotime($request['waktu_Pinjam_Mulai']));
		$waktuPinjamSelesai = date(strtotime($request['waktu_Pinjam_Selesai']));

		$checkFlag = True;

		foreach ($booklist as $list) {
						
			$waktuPakaiMulai = date(strtotime($list->$waktu_Pinjam_Mulai));
			$waktuPakaiSelesai = date(strtotime($list->$waktu_Pinjam_Selesai));

			if(($waktuPinjamMulai > $waktuPakaimMulai) && ($waktuPinjamMulai > $waktuPakaiSelesai)){
				$checkFlag = False;
			}

			if(($waktuPinjamSelesai > $waktuPakaiMulai) && ($waktuPinjamSelesai > $waktuPakaiSelesai)){
				$checkFlag = False;
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

			//dd($input);
			$input->save();
			//kirim email

			return redirect('/bookingRoom');
		}
		elseif($checkFlag == False){
			
			$haha=0;
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

}
