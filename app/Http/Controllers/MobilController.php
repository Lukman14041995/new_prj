<?php

namespace App\Http\Controllers;

use App\Models\MasterMobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public static function index(Request $request){
        $view_mobil = MasterMobil::all();

        return view('pages.master.mobil.index')->with([ 'view_mobil' => $view_mobil
        ]);
    }
    public static function create(Request $request){


        return view('pages.master.mobil.create');
    }
    public static function store(Request $request){
        // dd($request->all());
        $create = MasterMobil::create(['nopol' => $request->nopol,
        'merk' => $request->merk,
        'model' => $request->model,
        'status' => 'Tersedia',
        'tarif' => $request->tarif]);

        // $view_mobil = MasterMobil::all();

        return back();
    }
}