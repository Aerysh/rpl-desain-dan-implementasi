<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TimController extends Controller
{
    public function index()
    {
        return view('buatTim');
    }

    /**
    * Fungsi Buat Tim bagi User
    */
    public function store(Request $request)
    {
        Tim::insert([
            'nama'      =>  $request->namaTim,
        ]); // Insert nama tim ke database Tim

        $timId  =   Tim::orderBy('id', 'desc')->select('id')->get(); // mengambil id tim terbaru yang baru diinputkan ke database

        foreach($timId as $tim);
        DB::table('users_tim')->insert([
            'usersId'   =>  Auth::id(),
            'timId'     =>  $tim->id,
        ]); // Insert id tim ke database users_tim

        return redirect('home'); // redirect user ke home
    }

    public function show(Tim $tim)
    {
        //
    }

    public function edit(Tim $tim)
    {
        //
    }

    public function update(Request $request, Tim $tim)
    {
        //
    }

    public function destroy(Tim $tim)
    {
        //
    }
}
