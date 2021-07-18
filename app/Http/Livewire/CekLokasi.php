<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CekLokasi extends Component
{
    public $nama_lokasi;
    public $jenis_tanah;
    public $curah_hujan;
    public $kemiringan_lereng;
    public $ketinggian_lokasi;
    public $penggunaan_lahan;

    public $status;
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
            'jenis_tanah' => $this->jenis_tanah,
            'curah_hujan' => $this->curah_hujan,
            'kemiringan_lereng' => $this->kemiringan_lereng,
            'ketinggian_lokasi' => $this->ketinggian_lokasi,
            'penggunaan_lahan' => $this->penggunaan_lahan
        ];

        $this->status = true;

        $this->data = app('App\Http\Controllers\Controller')->fuzzy($this->request);

        // dd($data);
    }

    public function setelUlang()
    {
        $this->status = false;
        $this->nama_lokasi = '';
        $this->jenis_tanah = '';
        $this->curah_hujan = '';
        $this->kemiringan_lereng = '';
        $this->ketinggian_lokasi = '';
        $this->penggunaan_lahan = '';
    }

    public function render()
    {
        return view('livewire.cek-lokasi');
    }
}
