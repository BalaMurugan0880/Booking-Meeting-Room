<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Books;
use DB;



class BookNowController extends Controller
{
    public function index(){
    	$booking = Books::orderBy('id', 'DESC')->get();
    	return view('Booking/view', compact('booking'));
    }

   

    


}
