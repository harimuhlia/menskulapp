<?php

namespace App\Http\Controllers;

use App\Models\Datalatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        $dtlaporan = Datalatihan::where('user_id', auth()->user()->id)->get();
        return view('Data Laporan.laporan_index', compact('dtlaporan'));
    }

    public function getData(Request $request){
        $dtlaporan = Datalatihan::where('user_id', auth()->user()->id)
            ->whereBetween('tgl_latihan', [$request->tglawal, $request->tglakhir])
            ->get();
        return view('Data Laporan.laporan_index', compact('dtlaporan'));
    }
}
