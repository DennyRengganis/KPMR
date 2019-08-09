<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booklist;
class BooklistController extends Controller
{
    //
	public function view(){
        $list = booklist::all()->sortBy('id');  
        return view('',compact('list'));
    }

   public function delete(Request $request){
        $bookList = booklist::where('id',$request['id'])->first();
        $bookList -> delete();
        return back();
    }


}
