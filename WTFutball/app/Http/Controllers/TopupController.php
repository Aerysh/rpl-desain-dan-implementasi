<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{

    public function index()
    {
        return view('topup.index');
    }
    /**
    Fungsi ini akan melakukan pengecheckan terhadap database
    apakah voucher sudah terdapat dalam database atau tidak.
    jika voucher terdapat dalam database, maka saldo user akan ditambahkan
    lalu akan mengeluarkan notif bahwa redeem voucer berhasil.
    jika voucher tidak terdapat dalam database, maka akan mengeluarkan
    notif bahwa voucher error.
    */
    public function redeem(Request $request){
        $check = Topup::where('code', $request->voucherCode)->get();

        if(!$check->isEmpty()){
            $saldoUser  = User::where('id', Auth::id())->select('saldo')->get();
            User::where('id', Auth::id())->update([
                'saldo'     =>  $saldoUser + $check->saldo(),
            ]);

            return back()->with('voucher-sukses', 'voucher sukses');
        }

        return back()->with('voucher-404', 'voucher 404');
    }
    /**
    fungsi ini digunakan untuk menganti halaman
    ke halaman dimana admin akan membuat code voucher
    */
    public function create()
    {
        return view('topup.create');
    }
    /**
    fungsi ini digunakan untuk memasukkan voucher yang
    telah dibuat oleh admin kedalam database.
    code = code yang nantinya akan dimasukkan oleh user untuk topup
    saldo = jumlah saldo yang akan ditambahkan kepada user ketika menggunakan code voucher
    */
    public function store(Request $request)
    {
        Topup::insert([
            'code'      =>  $request->voucherCode,
            'saldo'     =>  $request->saldo,
        ]);

        return back()->with('sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
