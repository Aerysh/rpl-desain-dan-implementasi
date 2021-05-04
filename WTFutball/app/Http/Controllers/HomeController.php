<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim_User;
use App\Models\Tim;
use Illuminate\Support\Facades\DB;
use Auth;

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
        $cekTimUser = Tim_User::where('usersId', Auth::id())->get();
        if($cekTimUser->isEmpty()){
            return view('buatTim')->with('noTeam', 'no team');
        }

        return view('home');
    }
    /**
     * Menghitung rating total dari tim suatu yang dimiliki user
     * Algoritma akan menghitung berapa rata-rata rating pemain pada setiap posisi
     * Lalu rata-rata tersebut akan dijumlahkan kemudian dibagi 4 (karena terdapat 4 posisi yang berbeda pada suatu tim)
     * (FWD=Forward, MID=Midfielder, DEF=Defender, GK=GoalKeeper
     *
     * @return $rating
     */
    public function hitungRatingUser(){
        $timId = Tim_User::where('usersId', Auth::id())->select('timId')->get();
        foreach($timId as $tim);
        $ratingTim = DB::table('tim_player')->where('timId', $tim->timId)->join('player', 'tim_player.playerId', '=', 'player.id')->select('player.rating', 'player.posisi')->get();

        $ratingFWD = 0;
        $ratingMID = 0;
        $ratingDEF = 0;
        $ratingGK = 0;
        $countFWD = 0;
        $countMID = 0;
        $countDEF = 0;

        foreach($ratingTim as $r){
            if($r->posisi == "FWD"){
                $countFWD += 1;
                $ratingFWD += $r->rating;
            }

            if($r->posisi == "MID"){
                $countMID += 1;
                $ratingMID += $r->rating;
            }

            if($r->posisi == "DEF"){
                $countDEF += 1;
                $ratingDEF += $r->rating;
            }

            if($r->posisi == "GK"){
                $ratingGK += $r->rating;
            }
        }

        $rating = (($ratingFWD / $countFWD) + ($ratingMID / $countMID) + ($ratingDEF / $countDEF) + $ratingGK) / 4;

        return $rating;
    }
}
