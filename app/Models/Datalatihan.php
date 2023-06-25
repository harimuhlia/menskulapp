<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datalatihan extends Model
{
    use HasFactory;
    protected $table = "datalatihans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_pembina', 'nama_ekskul', 'hari_latihan', 'tgl_latihan', 'jam_mulai',
        'jam_selesai', 'tempat_latihan', 'materi_latihan', 'foto_latihan', 'jml_pria', 'jml_perempuan',
    ];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
