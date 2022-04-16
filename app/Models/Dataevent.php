<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataevent extends Model
{
    use HasFactory;
    protected $table = "dataevents";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'status_kegiatan', 'nama_kegiatan', 'tempat_kegiatan', 'tanggal_mulai_kegiatan', 'tanggal_akhir_kegiatan',
        'penyelenggara_kegiatan', 'nama_pembimbing', 'jenis_lomba', 'cabang_lomba', 'foto_kegiatan', 'nama_peserta'
    ];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
