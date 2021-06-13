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

class MainController extends Controller
{
    public function index()
    {
        $items = Lokasi::with('gambar','fuzzy')->get();
        return view('pages.home', [
            'items' => $items
        ]);
    }
    
    public function dashboard()
    {
        $total = Lokasi::all()->count();
        $tidak_rawan = Lokasi::where('tingkat_kerawanan', 'Tidak Rawan')->count();
        $rawan_sedang = Lokasi::where('tingkat_kerawanan', 'Rawan Sedang')->count();
        $rawan_tinggi = Lokasi::where('tingkat_kerawanan', 'Rawan Tinggi')->count();

        if ($tidak_rawan) {
            $tidak_rawan_percent = $tidak_rawan / $total * 100;
        } else {
            $tidak_rawan_percent = 0;
        }
        if ($rawan_sedang) {
            $rawan_sedang_percent = $rawan_sedang / $total * 100;
        } else {
            $rawan_sedang_percent = 0;
        }
        if ($rawan_tinggi) {
            $rawan_tinggi_percent = $rawan_tinggi / $total * 100;
        } else {
            $rawan_tinggi_percent = 0;
        }

        return view('pages.dashboard', [
            'tidak_rawan' => $tidak_rawan,
            'rawan_sedang' => $rawan_sedang,
            'rawan_tinggi' => $rawan_tinggi,
            'trp' => $tidak_rawan_percent,
            'rsp' => $rawan_sedang_percent,
            'rtp' => $rawan_tinggi_percent,
        ]);
    }
    public function dataLokasi()
    {
        $items = Lokasi::with('gambar','fuzzy')->get();
        return view('pages.data', compact('items'));
    }
    

    public function tambahGambar(GambarRequest $request)
    {
        $data = $request->all();
        $data['path'] = $request->file('path')->store(
            'gambar-lokasi/lokasi-'.$data['id_lokasi'], 'public'
        );

        Gambar::create($data);
        return redirect()->back();
    }
    public function hapusGambar($id)
    {
        $item = Gambar::find($id);
        $item->delete();

        return redirect()->back();
    }
}
