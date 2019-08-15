<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booklist;
use App\room;
use Auth;
class BooklistController extends Controller
{
    //
	public function view(){
        if(Auth::check()){
             $list = booklist::leftJoin('rooms','booklists.id_Ruangan','=','rooms.id')
                        ->leftJoin('buildings','rooms.id_gedung','=','buildings.id')
                        ->select('booklists.*','rooms.nama_ruangan as room_nama','buildings.nama_gedung as building_nama','rooms.lantai as room_lantai')
                        ->where('booklists.status','=','DELETED')
                        ->get();  
            //dd($list);
            return view('',compact('list'));
        }
       else return redirect('/');
    }

   public function delete(Request $request){
        if(Auth::check()){
            $bookList = booklist::where('id',$request['id'])->first();
            //$pin=sprintf("%s%s%s%s",$request['pin1'],$request['pin2'],$request['pin3'],$request['pin4']);
            if ($bookList != null){
                 $booklist->status = 'DELETED';
            } 
            return back()->withSuccess("Berhasil Menghapus Booklist");
        }
        else return redirect('/');
    }


}
