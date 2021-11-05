<?php

namespace App\Exports;

use App\Models\Dataevent;
use App\Models\Dataekskul;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        if (Auth::user()->role == 'Administrator') {
            return Dataevent::all();
        } else {
            $dtevent = Dataevent::where('user_id', auth()->user()->id)->get();
            return $dtevent;
        }
        
    }
}
