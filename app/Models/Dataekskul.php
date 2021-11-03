<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataekskul extends Model
{
    use HasFactory;
    protected $table = "dataekskuls";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kode_ekskul', 'nama_ekskul'
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
