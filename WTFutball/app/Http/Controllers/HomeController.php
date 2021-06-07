<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tim_User;
use App\Models\Tim;
use App\Models\users_pertandingan;
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
        // Mengecek apakah user yang login sudah memiliki tim atau belum
        // jika belum maka akan ke halaman buat tim
        // jika sudah masuk ke home
        $cekTimUser = Tim_User::where('usersId', Auth::id())->get();

        if($cekTimUser->isEmpty()){
            return view('buatTim')->with('noTeam', 'no team');
        }

        // mengambil nama tim user dari database
        $namaTim = Tim_User::where('usersId', Auth::id())->join('tim', 'users_tim.timId', '=', 'tim.id')->select('tim.nama')->get();

        // mengambil daftar pemain tim user
        $daftarPemain = DB::table('tim')
                        ->join('users_tim', 'tim.id', '=', 'users_tim.timId')
                        ->where('users_tim.usersId', Auth::id())
                        ->join('tim_player', 'tim.id', '=', 'tim_player.timId')
                        ->join('player', 'player.id', '=', 'tim_player.playerId')
                        ->select('player.nama', 'player.posisi', 'player.rating')
                        ->get();
        
        $ratingSaya = round($this->hitungRatingUser(Auth::id()));
        
        // home = page with no history
        // home2 = page with match history
        if($this->historySkor() == false){
            return view('home', compact('namaTim', 'daftarPemain', 'ratingSaya'))->with('noHistory', 'noHistory');
        }else{
            $historySkor = $this->historySkor();
            return view('home2', compact('namaTim', 'historySkor', 'daftarPemain', 'ratingSaya'));
        }
    }

    public function historySkor(){
        $getUser = users_pertandingan::where('homeId', Auth::id())
                ->select('pertandinganId', 'awayId')
                ->get();

        if($getUser->isEmpty()){
            return false;
        }else{
            foreach($getUser as $g);

            // get lawan
            $lawan = DB::table('users_tim')
                    ->where('usersId', $g->awayId)
                    ->join('tim', 'users_tim.timId', '=', 'tim.id')
                    ->select('tim.nama')
                    ->get();
            foreach($lawan as $l);

            // get skor
            $skor = DB::table('pertandingan')
                    ->where('id', $g->pertandinganId)
                    ->select('skorHome', 'skorAway', 'created_at')
                    ->get();
            foreach($skor as $s);

            // create collection
            $history = collect([
                        'lawan' => $l->nama, 
                        'skorHome' => $s->skorHome, 
                        'skorAway' => $s->skorAway, 
                        'created_at' => $s->created_at
                        ]);

            // return collection
            return $history;
        }
    }

    public function hitungRatingUser($id){
        $timId = Tim_User::where('usersId', $id)
                    ->select('timId')
                    ->get();

        foreach($timId as $tim);

        $ratingTim = DB::table('tim_player')
                    ->where('timId', $tim->timId)
                    ->join('player', 'tim_player.playerId', '=', 'player.id')
                    ->select('player.rating', 'player.posisi')
                    ->get();

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

        if($countFWD == 0 || $countMID == 0 || $countDEF == 0 ){
            return 0;
        }else{
            $rating = (($ratingFWD / $countFWD) + ($ratingMID / $countMID) + ($ratingDEF / $countDEF) + $ratingGK) / 4;
            return $rating;
        }
    }
}
