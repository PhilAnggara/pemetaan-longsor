<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gambar extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gambar';

    protected $fillable = [
        'id_lokasi',
        'path'
    ];

    protected $hidden = [

    ];

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id');
    }
}
