<?php

namespace App\Http\Controllers;

use App\Models\Datalatihan;
use App\Models\Dataekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DatalatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtekskul = Dataekskul::all();
        if (Auth::user()->role == 'Administrator') {
            $dtlatihan = Datalatihan::All();
            return view('Data Latihan.Data_Latihan', compact('dtlatihan', 'dtekskul'));
        } else {
            $dtlatihan = Datalatihan::where('user_id', auth()->user()->id)->get();
            return view('Data Latihan.Data_Latihan', compact('dtlatihan', 'dtekskul'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Latihan.Tambah_Latihan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembina'=>'required',
            'nama_ekskul'=>'required',
        ]);
        
        $dtlatihan= New Datalatihan();
        $dtlatihan->user_id=Auth::user()->id;
        $dtlatihan->nama_pembina=$request->get('nama_pembina');
        $dtlatihan->nama_ekskul=$request->get('nama_ekskul');
        $dtlatihan->hari_latihan=$request->get('hari_latihan');
        $dtlatihan->tgl_latihan=$request->get('tgl_latihan');
        $dtlatihan->jam_mulai=$request->get('jam_mulai');
        $dtlatihan->jam_selesai=$request->get('jam_selesai');
        $dtlatihan->tempat_latihan=$request->get('tempat_latihan');
        $dtlatihan->materi_latihan=$request->get('materi_latihan');
        $dtlatihan->jml_pria=$request->get('jml_pria');
        $dtlatihan->jml_perempuan=$request->get('jml_perempuan');
        if($request->hasFile('foto_latihan'))
        {
            $file = $request->file('foto_latihan');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotolatihan/', $filename);
            $dtlatihan->foto_latihan = $filename;
        }
        $dtlatihan->save();

        return redirect()->route('datalatihan.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtlatihan = Datalatihan::find($id);
        return view('Data Latihan.Data_Latihan', compact('dtlatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dtlatihan = Datalatihan::findOrFail($id);
        return view('Data Latihan.Data_Latihan', compact('dtlatihan'));
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
        $request->validate([
            'nama_pembina'=>'required',
            'nama_ekskul'=>'required',
        ]);
        
        $dtlatihan= Datalatihan::find($id);
        $dtlatihan->user_id=Auth::user()->id;
        $dtlatihan->nama_pembina=$request->get('nama_pembina');
        $dtlatihan->nama_ekskul=$request->get('nama_ekskul');
        $dtlatihan->hari_latihan=$request->get('hari_latihan');
        $dtlatihan->tgl_latihan=$request->get('tgl_latihan');
        $dtlatihan->jam_mulai=$request->get('jam_mulai');
        $dtlatihan->jam_selesai=$request->get('jam_selesai');
        $dtlatihan->tempat_latihan=$request->get('tempat_latihan');
        $dtlatihan->materi_latihan=$request->get('materi_latihan');
        $dtlatihan->jml_pria=$request->get('jml_pria');
        $dtlatihan->jml_perempuan=$request->get('jml_perempuan');
        if($request->hasFile('foto_latihan'))
        {
            $destination = 'fotolatihan/'.$dtlatihan->foto_latihan;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto_latihan');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotolatihan/', $filename);
            $dtlatihan->foto_latihan = $filename;
        }
        $dtlatihan->update();

        return redirect()->route('datalatihan.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtlatihan = Datalatihan::find($id);
        $destination = 'fotolatihan/'.$dtlatihan->foto_latihan;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        $dtlatihan->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
