<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim_User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cekTimUser = Tim_User::where('usersId', Auth::id())->get();
        if($cekTimUser->isEmpty()){
            return view('buatTim')->with('noTeam', 'no team');
        }
        return view('home');
    }
}
