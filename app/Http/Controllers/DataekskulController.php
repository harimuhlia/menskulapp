<?php

namespace App\Http\Controllers;

use App\Models\Dataekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataekskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtekskul = Dataekskul::all();
        return view('Data Master.Data Ekskul.Data_Ekskul', compact('dtekskul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Master.Data Ekskul.Tambah_Ekskul');
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
            'kode_ekskul'=>'required|unique:dataekskuls|min:2|max:4',
            'nama_ekskul'=>'required',
        ]);

        // DataEkskul::create($request->all());

        $dataekskul= New Dataekskul;
        $dataekskul->user_id=Auth::user()->id;
        $dataekskul->kode_ekskul=$request->get('kode_ekskul');
        $dataekskul->nama_ekskul=$request->get('nama_ekskul');
        $dataekskul->save();
        
        return redirect()->route('dataekskul.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataekskul = Dataekskul::find($id);
        return view('Data Master.Data Ekskul.Data_Ekskul', compact('dataekskul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataekskul = Dataekskul::findOrFail($id);
        return view('Data Master.Data Ekskul.Data_Ekskul', compact('dataekskul'));
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
            'kode_ekskul'=>'required|unique:dataekskuls|min:2|max:4',
            'nama_ekskul'=>'required',
        ]);
        Dataekskul::find($id)
            ->update($request->all());
        
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtekskul = Dataekskul::findOrFail($id);
        $dtekskul->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
