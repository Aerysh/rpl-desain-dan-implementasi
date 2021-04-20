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

    public function store(Request $request)
    {
        Tim::insert([
            'nama'      =>  $request->namaTim,
        ]);

        $timId  =   Tim::orderBy('id', 'desc')->select('id')->get();

        foreach($timId as $tim);
        DB::table('users_tim')->insert([
            'usersId'   =>  Auth::id(),
            'timId'     =>  $tim->id,
        ]);

        return redirect('home');
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
