<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function dateAndTime(){
        $currentYear = date('Y');
        $currentMonth = date('F');
        $currentDate=date('d');

        return $currentDate.' '. $currentMonth. ' '. $currentYear;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $date=$this->dateAndTime();
        
        return view('users.userHome',[
            'user'=>$user,
            'date'=>$date
        ]);
    }
}
