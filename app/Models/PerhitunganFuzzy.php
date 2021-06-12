<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerhitunganFuzzy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gambar';

    protected $fillable = [
        'id_lokasi',
        'jenis_tanah',
        'curah_hujan',
        'kemiringan_lereng',
        'ketinggian_lokasi',
        'penggunaan_lahan',
        'kelas_kerawanan'
    ];

    protected $hidden = [

    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id');
    }
}
