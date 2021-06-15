<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LokasiiRequest;
use App\Http\Requests\GambarRequest;
use App\Models\Lokasi;
use App\Models\PerhitunganFuzzy;
use App\Models\Gambar;
use Auth;
Use Alert;

class FuzzyController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['penggunaan_lahan'] == 'Hutan') {
            $data['tingkat_kerawanan'] = 'Tidak Rawan';
        } elseif ($data['penggunaan_lahan'] == 'Perkebunan') {
            $data['tingkat_kerawanan'] = 'Rawan Sedang';
        } else {
            $data['tingkat_kerawanan'] = 'Rawan Tinggi';
        }
        
        $lokasi = Lokasi::create($data);
        $data['koordinat'] = $data['latitude'].', '. $data['longitude'];
        // dd($data);

        $gambar['id_lokasi'] = $lokasi->id;
        $gambar['path'] = $request->file('path')->store(
            'gambar-lokasi/lokasi-'.$gambar['id_lokasi'], 'public'
        );
        Gambar::create($gambar);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($data['penggunaan_lahan'] == 'Hutan') {
            $data['tingkat_kerawanan'] = 'Tidak Rawan';
        } elseif ($data['penggunaan_lahan'] == 'Perkebunan') {
            $data['tingkat_kerawanan'] = 'Rawan Sedang';
        } else {
            $data['tingkat_kerawanan'] = 'Rawan Tinggi';
        }

        $lokasi = Lokasi::find($id);
        $lokasi->update($data);

        return redirect()->back()->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();

        $fuzzy = PerhitunganFuzzy::where('id_lokasi', $id)->first();
        // $fuzzy->delete();

        return redirect()->back()->with('toast_success', 'Data Dihapus!');
    }
}
