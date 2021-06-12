<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lokasi';

    protected $fillable = [
        'id_user',
        'nama_lokasi',
        'kecamatan',
        'latitude',
        'longitude',
        'jenis_tanah',
        'curah_hujan',
        'kemiringan_lereng',
        'ketinggian_lokasi',
        'penggunaan_lahan',
        'tingkat_kerawanan'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function fuzzy(){
        return $this->hasOne(PerhitunganFuzzy::class, 'id_lokasi', 'id');
    }
    public function gambar(){
        return $this->hasMany(Gambar::class, 'id_lokasi', 'id');
    }
}
