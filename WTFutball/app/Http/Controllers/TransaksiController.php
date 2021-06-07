<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tim_User;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function indexBeli()
    {
        // Mengambil data pemain tanpa tim
        $daftarPemain = DB::table('player')
                        ->leftJoin('tim_player', 'player.id', '=', 'tim_player.playerId')
                        ->whereNull('tim_player.playerId')
                        ->select('player.id', 'player.nama', 'player.posisi', 'player.harga', 'player.rating')
                        ->get();
        return view('transaksi.beli', compact('daftarPemain'));
    }

    public function indexJual()
    {
        // mengambil daftar pemain tim user
        $daftarPemain = DB::table('tim')
                        ->join('users_tim', 'tim.id', '=', 'users_tim.timId')
                        ->where('users_tim.usersId', Auth::id())
                        ->join('tim_player', 'tim.id', '=', 'tim_player.timId')
                        ->join('player', 'player.id', '=', 'tim_player.playerId')
                        ->select('player.id', 'player.nama', 'player.posisi', 'player.rating', 'player.harga')
                        ->get();

        return view('transaksi.jual', compact('daftarPemain'));
    }

    public function beliPemain($id)
    {
        // Mengambil ID Team milik User
        $idTim = Tim_User::where('usersId', Auth::id())->select('timId')->get();

        foreach($idTim as $it);

        // Cek Apakah User Sudah Memiliki 11 Pemain
        $count = DB::table('tim_player')->where('timId', $it->timId)->count();

        // Jika User Sudah Memiliki 11 Pemain
        if($count == 11){
            return redirect('/transaksi/beli')->with('fullTeam', 'Full Team');
        // Jika User Kekurangan Pemain
        }else{

            $harga = DB::table('player')->where('id', $id)->select('harga')->get();
            $saldo = Auth::user()->saldo;
            foreach($harga as $h);
            if($h->harga > $saldo){
                return redirect('/transaksi/beli')->with('saldoKurang', 'Saldo Kurang');
            }else{
                $saldo = $saldo - $h->harga;
                // Update Saldo User
                DB::table('users')->where('id', Auth::id())->update([
                    'saldo' =>  $saldo,
                ]);

                // Memasukan Pemain kedalam Tim Milik User
                DB::table('tim_player')->insert([
                    'timId' =>  $it->timId,
                    'playerId'  =>  $id,
                ]);
                return redirect('/transaksi/beli')->with('beliSuccess', 'Beli Success');
            }

            
        }
    }

    public function jualPemain($id)
    {
        // Mengambil Harga Pemain
        $harga = DB::table('player')->where('id', $id)->select('harga')->get();
        foreach($harga as $h);

        // Mengambil Saldo User
        $saldo = Auth::user()->saldo;

        // Update Saldo User
        DB::table('users')->where('id', Auth::id())->update([
            'saldo' =>  $saldo + $h->harga,
        ]);

        DB::table('tim_player')->where('playerId', $id)->delete();

        return redirect('/transaksi/jual')->with('jualSuccess', 'Jual Success');
    }
}
