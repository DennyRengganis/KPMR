<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booklist;
use App\room;
class BooklistController extends Controller
{
    //
	public function view(){
        $list = booklist::leftJoin('rooms','booklists.id_Ruangan','=','rooms.id')
                        ->leftJoin('buildings','rooms.id_gedung','=','buildings.id')
                        ->select('booklists.*','rooms.id as room_id','buildings.id as building_id')
                        ->get();  
        return view('',compact('list'));
    }

   public function delete(Request $request){
        $bookList = booklist::where('id',$request['id'])->first();
        $pin=sprintf("%s%s%s%s",$request['pin1'],$request['pin2'],$request['pin3'],$request['pin4']);
        if ($bookList != null){
            if($bookList->PIN==$pin){
             $bookList->delete();
            }
            else{
                return back()->withErrors('PIN Salah');
            }
        } 
        return back();
    }


}
