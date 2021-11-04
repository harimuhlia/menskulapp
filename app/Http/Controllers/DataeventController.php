<?php

namespace App\Http\Controllers;

use App\Exports\EventExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Models\Dataevent;
use App\Models\Dataekskul;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataeventController extends Controller
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
            $dtevent = Dataevent::All();
            return view('Data Event.Data_Event', compact('dtevent', 'dtekskul'));
        } else {
            $dtevent = Dataevent::where('user_id', auth()->user()->id)->get();
            return view('Data Event.Data_Event', compact('dtevent', 'dtekskul'));
        }

    }

    public function EventExport(){
        return Excel::Download(New EventExport, 'dataevent.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Event.Tambah_Event');
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
            'status_kegiatan'=>'required',
            'nama_kegiatan'=>'required',
        ]);
        
        $dataevent= New Dataevent();
        $dataevent->user_id=Auth::user()->id;
        $dataevent->status_kegiatan=$request->input('status_kegiatan');
        $dataevent->nama_kegiatan=$request->input('nama_kegiatan');
        $dataevent->tempat_kegiatan=$request->input('tempat_kegiatan');
        $dataevent->tanggal_mulai_kegiatan=$request->input('tanggal_mulai_kegiatan');
        $dataevent->tanggal_akhir_kegiatan=$request->input('tanggal_akhir_kegiatan');
        $dataevent->penyelenggara_kegiatan=$request->input('penyelenggara_kegiatan');
        $dataevent->nama_pembimbing=$request->input('nama_pembimbing');
        $dataevent->jenis_lomba=$request->input('jenis_lomba');
        $dataevent->nama_peserta=$request->get('nama_peserta');
        $dataevent->cabang_lomba=$request->input('cabang_lomba');
        if($request->hasFile('foto_kegiatan'))
        {
            $file = $request->file('foto_kegiatan');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotoevent/', $filename);
            $dataevent->foto_kegiatan = $filename;
        }
        $dataevent->save();

        return redirect()->route('dataevent.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dtevent = Dataevent::find($id);
        return view('Data Event.Data_Event', compact('dtevent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataevent = Dataevent::findOrFail($id);
        return view('Data Event.Data_Event', compact('dataevent'));
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
            'status_kegiatan'=>'required',
            'nama_kegiatan'=>'required',
        ]);
        $dataevent = Dataevent::find($id);
        $dataevent->user_id=Auth::user()->id;
        $dataevent->status_kegiatan=$request->get('status_kegiatan');
        $dataevent->nama_kegiatan=$request->get('nama_kegiatan');
        $dataevent->tempat_kegiatan=$request->get('tempat_kegiatan');
        $dataevent->tanggal_mulai_kegiatan=$request->get('tanggal_mulai_kegiatan');
        $dataevent->tanggal_akhir_kegiatan=$request->get('tanggal_akhir_kegiatan');
        $dataevent->penyelenggara_kegiatan=$request->get('penyelenggara_kegiatan');
        $dataevent->nama_pembimbing=$request->get('nama_pembimbing');
        $dataevent->jenis_lomba=$request->get('jenis_lomba');
        $dataevent->nama_peserta=$request->get('nama_peserta');
        $dataevent->cabang_lomba=$request->get('cabang_lomba');
        if($request->hasFile('foto_kegiatan'))
        {
            $destination = 'fotoevent/'.$dataevent->foto_kegiatan;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto_kegiatan');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotoevent/', $filename);
            $dataevent->foto_kegiatan = $filename;
        }
        $dataevent->update();

        return redirect()->route('dataevent.index')->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtevent = Dataevent::find($id);
        $destination = 'fotoevent/'.$dtevent->foto_kegiatan;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        $dtevent->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
