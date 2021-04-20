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


    public function create()
    {
        return view('topup.create');
    }

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
