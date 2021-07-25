<?php

namespace App\Http\Livewire;

use App\Models\Lokasi;
use App\Models\Gambar;
use Livewire\Component;
use Livewire\WithFileUploads;

class CekLokasi extends Component
{
    use WithFileUploads;
    
    public $nama_lokasi;
    public $kecamatan;
    public $latitude;
    public $longitude;
    public $jenis_tanah;
    public $curah_hujan;
    public $kemiringan_lereng;
    public $ketinggian_lokasi;
    public $penggunaan_lahan;

    public $path;

    public $status;
    public $hasil;
    public $request = [];
    public $data = [];

    public function mount()
    {
        $this->status = false;
    }

    public function cekLokasi()
    {
        $this->request = [
            'nama_lokasi' => $this->nama_lokasi,
            'kecamatan' => $this->kecamatan,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'jenis_tanah' => $this->jenis_tanah,
            'curah_hujan' => $this->curah_hujan,
            'kemiringan_lereng' => $this->kemiringan_lereng,
            'ketinggian_lokasi' => $this->ketinggian_lokasi,
            'penggunaan_lahan' => $this->penggunaan_lahan
        ];

        $this->status = true;

        $this->data = app('App\Http\Controllers\Controller')->fuzzy($this->request);
        
        $this->hasil = $this->data['tingkat_kerawanan'];
    }

    public function setelUlang()
    {
        $this->status = false;

        $this->nama_lokasi = '';
        $this->kecamatan = '';
        $this->latitude = '';
        $this->longitude = '';
        $this->jenis_tanah = '';
        $this->curah_hujan = '';
        $this->kemiringan_lereng = '';
        $this->ketinggian_lokasi = '';
        $this->penggunaan_lahan = '';
        
        $this->hasil = '';
    }

    public function store()
    {        
        $lokasi = Lokasi::create([
            'nama_lokasi' => $this->data['nama_lokasi'],
            'kecamatan' => $this->data['kecamatan'],
            'latitude' => $this->data['latitude'],
            'longitude' => $this->data['longitude'],
            'jenis_tanah' => $this->data['jenis_tanah'],
            'curah_hujan' => $this->data['curah_hujan'],
            'kemiringan_lereng' => $this->data['kemiringan_lereng'],
            'ketinggian_lokasi' => $this->data['ketinggian_lokasi'],
            'penggunaan_lahan' => $this->data['penggunaan_lahan'],
            'tingkat_kerawanan' => $this->data['tingkat_kerawanan']
        ]);

        $gambar['id_lokasi'] = $lokasi->id;
        $gambar['path'] = $this->path->store(
            'gambar-lokasi/lokasi-'.$gambar['id_lokasi'], 'public'
        );
        Gambar::create($gambar);


        
        session()->flash('success', 'Lokasi Berhasil Disimpan!');

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.cek-lokasi');
    }
}
