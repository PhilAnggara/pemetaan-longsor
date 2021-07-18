<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fuzzy($request)
    {
        $data = $request;
        
        $a['jenis_tanah'] = $request['jenis_tanah'];
        $b['curah_hujan'] = $request['curah_hujan'];
        $c['kemiringan_lereng'] = $request['kemiringan_lereng'];
        $d['ketinggian_lokasi'] = $request['ketinggian_lokasi'];
        $e['penggunaan_lahan'] = $request['penggunaan_lahan'];
        
        // Jenis Tanah
        // Menentukan Kelas dan Nilai x Jenis Tanah
        if ($a['jenis_tanah'] == 'Alluvial') {
            $a['kelas'] = 'Kurang Peka';
            $a['skor'] = 10;
            $a['linguistik'] = '0 ≤ x ≤ 10';
            $a['eq'] = '(10 - x) / 10';

        } elseif ($a['jenis_tanah'] == 'Latosol/Litosol') {
            $a['kelas'] = 'Peka';
            $a['skor'] = 15;
            $a['linguistik'] = '10 ≤ x < 20';
            $a['eq'] = '(x - 10) / 10';

        } elseif ($a['jenis_tanah'] == 'Entisol') {
            $a['kelas'] = 'Sangat Peka';
            $a['skor'] = 20;
            $a['linguistik'] = 'x ≥ 20';
            $a['eq'] = '1';

        }
        // Menghitung Derajat Keanggotaan Jenis Tanah
        if ($a['skor'] <= 10) {
            $a['dk'] = (10 - $a['skor']) / 10;

        } elseif (10 < $a['skor'] && $a['skor'] < 20) {
            $a['dk'] = ($a['skor'] - 10) / 10;

        } elseif ($a['skor'] >= 20) {
            $a['dk'] = 1;

        }

        // Curah Hujan
        // Menentukan Kelas dan Nilai x Curah Hujan
        if ($b['curah_hujan'] == 0) {
            $b['kelas'] = 'Tidak Ada Hujan';
            $b['skor'] = 8;
            $b['linguistik'] = '0 ≤ x ≤ 10';
            $b['eq'] = '(10 - x) / 10';

        } elseif ($b['curah_hujan'] >= 0 && $b['curah_hujan'] <= 100) {
            $b['kelas'] = 'Rendah';
            $b['skor'] = 14;
            $b['linguistik'] = '10 < x ≤ 20';
            $b['eq'] = '(x - 10) / 10';

        } elseif ($b['curah_hujan'] >= 101 && $b['curah_hujan'] <= 300) {
            $b['kelas'] = 'Menengah';
            $b['skor'] = 24;
            $b['linguistik'] = '20 < x ≤ 30';
            $b['eq'] = '(30 - x) / 10';

        } elseif ($b['curah_hujan'] >= 301 && $b['curah_hujan'] <= 400) {
            $b['kelas'] = 'Tinggi';
            $b['skor'] = 32;
            $b['linguistik'] = '30 < x < 40';
            $b['eq'] = '(40 - x) / 10';

        } elseif ($b['curah_hujan'] > 400) {
            $b['kelas'] = 'Sangat Tinggi';
            $b['skor'] = 40;
            $b['linguistik'] = 'x ≥ 40';
            $b['eq'] = '1';

        }
        // Menghitung Derajat Keanggotaan Curah Hujan
        if (0 <= $b['skor'] && $b['skor'] <= 10) {
            $b['dk'] = (10 - $b['skor']) / 10;

        } elseif (10 < $b['skor'] && $b['skor'] <= 20) {
            $b['dk'] = ($b['skor'] - 10) / 10;

        } elseif (20 < $b['skor'] && $b['skor'] <= 30) {
            $b['dk'] = (30 - $b['skor']) / 10;

        } elseif (30 < $b['skor'] && $b['skor'] < 40) {
            $b['dk'] = (40 - $b['skor']) / 10;

        } elseif ($b['skor'] >= 40) {
            $b['dk'] = 1;
        }

        // Kemiringan Lereng
        // Menentukan Kelas dan Nilai x Kemiringan Lereng
        if ($c['kemiringan_lereng'] >= 0 && $c['kemiringan_lereng'] <= 8) {
            $c['kelas'] = 'Dataran Landai';
            $c['skor'] = 7;
            $c['linguistik'] = '0 ≤ x ≤ 10';
            $c['eq'] = '(10 - x) / 10';

        } elseif ($c['kemiringan_lereng'] >= 8 && $c['kemiringan_lereng'] <= 15) {
            $c['kelas'] = 'Berombak';
            $c['skor'] = 15;
            $c['linguistik'] = '10 < x ≤ 20';
            $c['eq'] = '(x - 10) / 10';

        } elseif ($c['kemiringan_lereng'] >= 15 && $c['kemiringan_lereng'] <= 40) {
            $c['kelas'] = 'Berombak Berbukit';
            $c['skor'] = 23;
            $c['linguistik'] = '20 < x < 30';
            $c['eq'] = '(30 - x) / 10';

        } elseif ($c['kemiringan_lereng'] > 40) {
            $c['kelas'] = 'Bergunung';
            $c['skor'] = 30;
            $c['linguistik'] = 'x ≥ 30';
            $c['eq'] = '1';

        }
        // Menghitung Derajat Keanggotaan Kemiringan Lereng
        if (0 <= $c['skor'] && $c['skor'] <= 10) {
            $c['dk'] = (10 - $c['skor']) / 10;

        } elseif (10 < $c['skor'] && $c['skor'] <= 20) {
            $c['dk'] = ($c['skor'] - 10) / 10;

        } elseif (20 < $c['skor'] && $c['skor'] < 30) {
            $c['dk'] = (30 - $c['skor']) / 10;

        } elseif ($c['skor'] >= 30) {
        
            $c['dk'] = 1;
        }

        // Ketinggian Lokasi
        // Menentukan Kelas dan Nilai x Ketinggian Lokasi
        if ($d['ketinggian_lokasi'] <= 240) {
            $d['kelas'] = 'Sangat Rendah';
            $d['skor'] = 8;
            $d['linguistik'] = '0 ≤ x ≤ 10';
            $d['eq'] = '(10 - x) / 10';

        } elseif ($d['ketinggian_lokasi'] >= 240 && $d['ketinggian_lokasi'] <= 560) {
            $d['kelas'] = 'Rendah';
            $d['skor'] = 14;
            $d['linguistik'] = '10 < x ≤ 20';
            $d['eq'] = '(x - 10) / 10';

        } elseif ($d['ketinggian_lokasi'] >= 560 && $d['ketinggian_lokasi'] <= 1000) {
            $d['kelas'] = 'Sedang';
            $d['skor'] = 24;
            $d['linguistik'] = '20 < x ≤ 30';
            $d['eq'] = '(30 - x) / 10';

        } elseif ($d['ketinggian_lokasi'] > 1000 && $d['ketinggian_lokasi'] <= 2500) {
            $d['kelas'] = 'Tinggi';
            $d['skor'] = 32;
            $d['linguistik'] = '30 < x < 40';
            $d['eq'] = '(40 - x) / 10';

        } elseif ($d['ketinggian_lokasi'] > 2500) {
            $d['kelas'] = 'Sangat Tinggi';
            $d['skor'] = 40;
            $d['linguistik'] = 'x ≥ 40';
            $d['eq'] = '1';

        }
        // Menghitung Derajat Keanggotaan Ketinggian Lokasi
        if (0 <= $d['skor'] && $d['skor'] <= 10) {
            $d['dk'] = (10 - $d['skor']) / 10;

        } elseif (10 < $d['skor'] && $d['skor'] <= 20) {
            $d['dk'] = ($d['skor'] - 10) / 10;

        } elseif (20 < $d['skor'] && $d['skor'] <= 30) {
            $d['dk'] = (30 - $d['skor']) / 10;

        } elseif (30 < $d['skor'] && $d['skor'] < 40) {
            $d['dk'] = (40 - $d['skor']) / 10;

        } elseif ($d['skor'] >= 40) {
            $d['dk'] = 1;
        }

        // Penggunaan lahan
        // Menentukan Kelas dan Nilai x Penggunaan Lahan
        if ($e['penggunaan_lahan'] == 'Hutan') {
            $e['kelas'] = 'Kurang Peka';
            $e['skor'] = 10;
            $e['linguistik'] = '0 ≤ x ≤ 10';
            $e['eq'] = '(10 - x) / 10';

        } elseif ($e['penggunaan_lahan'] == 'Perkebunan') {
            $e['kelas'] = 'Peka';
            $e['skor'] = 15;
            $e['linguistik'] = '10 < x < 20';
            $e['eq'] = '(x - 10) / 10';

        } elseif ($e['penggunaan_lahan'] == 'Pemukiman Tinggal') {
            $e['kelas'] = 'Sangat Peka';
            $e['skor'] = 20;
            $e['linguistik'] = 'x ≥ 20';
            $e['eq'] = '1';

        }
        // Menghitung Derajat Keanggotaan Penggunaan lahan
        if (0 <= $e['skor'] && $e['skor'] <= 10) {
            $e['dk'] = (10 - $e['skor']) / 10;

        } elseif (10 < $e['skor'] && $e['skor'] < 20) {
            $e['dk'] = ($e['skor'] - 10) / 10;

        } elseif ($e['skor'] >= 20) {
            $e['dk'] = 1;

        }

        // Menghitung Defuzzifikasi dengan metode centroid method / center of grafity 
        $y['hasil'] = (($a['skor'] * $a['dk']) + ($b['skor'] * $b['dk']) + ($c['skor'] * $c['dk']) + ($d['skor'] * $d['dk']) + ($e['skor'] * $e['dk']))
                            / (($a['dk'] + $b['dk'] + $c['dk'] + $d['dk'] + $e['dk']) * 5);
        if ($y['hasil'] <= 3.40) {
            $y['kelas'] = 'Tidak Rawan';
        } elseif ($y['hasil'] > 3.40 && $y['hasil'] <= 5.40) {
            $y['kelas'] = 'Rawan Sedang';
        } elseif ($y['hasil'] > 5.40) {
            $y['kelas'] = 'Rawan Tinggi';
        }

        // Memasukan hasil perhitungan kedalam variable $data untuk disimpan ke database
        $data['pembilang'] = ($a['skor'] * $a['dk']) + ($b['skor'] * $b['dk']) + ($c['skor'] * $c['dk']) + ($d['skor'] * $d['dk']) + ($e['skor'] * $e['dk']);
        $data['penyebut'] = ($a['dk'] + $b['dk'] + $c['dk'] + $d['dk'] + $e['dk']) * 5;
        $data['skor_kerawanan'] = $y['hasil'];

        $data['tingkat_kerawanan'] = $y['kelas'];
        $data['a'] = $a;
        $data['b'] = $b;
        $data['c'] = $c;
        $data['d'] = $d;
        $data['e'] = $e;

        return $data;
    }
}
