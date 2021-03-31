<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     public function store(Request $request){

        $booknow = new Books();

        $booknow->location = $request->input('gridRadios');
        $booknow->person = $request->input('person');
        $booknow->user_id = Auth::user()->id;
        $booknow->name = Auth::user()->name;
        $booknow->date = $request->input('date1');
        $booknow->hours = $request->input('hours');
        $booknow->time = $request->input('time');
        $booknow->tables_id = $request->input('table');


        $booknow->save();
        Session::flash('message', 'Slot Added successfully');
        return redirect()->to('bookingview');

    }

     public function checkAvailablity(Request $request){

            $request->validate([
            'date1' => 'required',
            'time' => 'required',

        ]);

        $date = $request->input('date1');
        $time = $request->input('time');
        $hours = $request->input('hours');
        $person = $request->input('person');
        $table = $request->input('table');
        $location = $request->input('gridRadios');




        $checkNow = Books::where('date',$date)->where('time', $time)->count();
        //$checkNow2 = Books::where(['tables_id' => 1,'date' => $date,'time' => $time])->exists();
        //$checkNow3 = Books::where(['tables' => 2,'date' => $date,'time' => $time])->exists();
        // $checkNow4 = Books::where(['date' => $date,'time' => $time,'table' => 3])->count();
        // $checkNow5 = Books::where(['date' => $date,'time' => $time,'table' => 4])->count();
        // $checkNow6 = Books::where(['date' => $date,'time' => $time,'table' => 5])->count();
        // $checkNow7 = Books::where(['date' => $date,'time' => $time,'table' => 6])->count();
        // $checkNow8 = Books::where(['date' => $date,'time' => $time,'table' => 7])->count();
        // $checkNow9 = Books::where(['date' => $date,'time' => $time,'table' => 8])->count();
        // $checkNow10 = Books::where(['date' => $date,'time' => $time,'table' => 9])->count();



        // $checkNow2 = Books::where('date',$date)->where('time', $time)->where('table', 1)->count();
        // $checkNow3 = Books::where('date',$date)->where('time', $time)->where('table', 2)->count();
        // $checkNow4 = Books::where('date',$date)->where('time', $time)->where('table', 3)->count();
        // $checkNow5 = Books::where('date',$date)->where('time', $time)->where('table', 4)->count();
        // $checkNow6 = Books::where('date',$date)->where('time', $time)->where('table', 5)->count();
        // $checkNow7 = Books::where('date',$date)->where('time', $time)->where('table', 6)->count();
        // $checkNow8 = Books::where('date',$date)->where('time', $time)->where('table', 7)->count();
        // $checkNow9 = Books::where('date',$date)->where('time', $time)->where('table', 8)->count();
        // $checkNow10 = Books::where('date',$date)->where('time', $time)->where('table', 9)->count();




        if($location == 'Library'){




            $bookavail =Books::where(['tables_id' => $table,'date' => $date,'time' => $time])->count();




            if ($bookavail > 0) {

  Session::flash('message', 'Slot Has Been Full');
                    
                        return redirect()->to('home');  
                
                       
               

            }else{


                 Session::flash('message', 'Slot Available');
                            Session::flash('date', $date);
                            Session::flash('time', $time);
                            Session::flash('hours', $hours);
                            Session::flash('person', $person);
                            Session::flash('table', $table);
                            Session::flash('location', $location);



                            return redirect()->to('add'); 

                        
                    
                }

            
        }elseif($location == 'The Hub'){
                if($checkNow == 2){
            Session::flash('message', 'Slot Has Been Full');
            return redirect()->to('home');
            }else{
                Session::flash('message', 'Slot Available');
                Session::flash('date', $date);
                Session::flash('time', $time);
                Session::flash('hours', $hours);
                Session::flash('person', $person);
                Session::flash('table', $table);
                Session::flash('location', $location);



                return redirect()->to('add');   
         }
        }






        // if($location == 'Library'){
        //     if (Books::where(['table' => 1,'date' => $date,'time' => $time])->exists() ||  Books::where(['table' => 2,'date' => $date,'time' => $time])->exists() ) {

        //                  Session::flash('message', 'Slot Has Been Full');
        //                 return redirect()->to('home');  
               

        //     }else{
        //          Session::flash('message', 'Slot Available');
        //                     Session::flash('date', $date);
        //                     Session::flash('time', $time);
        //                     Session::flash('hours', $hours);
        //                     Session::flash('person', $person);
        //                     Session::flash('table', $table);
        //                     Session::flash('location', $location);



        //                     return redirect()->to('add'); 
                
                        
                    
        //         }
            
        // }elseif($location == 'The Hub'){
        //         if($checkNow == 2){
        //     Session::flash('message', 'Slot Has Been Full');
        //     return redirect()->to('home');
        //     }else{
        //         Session::flash('message', 'Slot Available');
        //         Session::flash('date', $date);
        //         Session::flash('time', $time);
        //         Session::flash('hours', $hours);
        //         Session::flash('person', $person);
        //         Session::flash('table', $table);
        //         Session::flash('location', $location);



        //         return redirect()->to('add');   
        //  }
        // }

        


        
    }
}
