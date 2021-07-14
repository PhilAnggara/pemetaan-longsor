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
        $data = $request->all();
        
        $a = $request->jenis_tanah;
        $b = $request->curah_hujan;
        $c = $request->kemiringan_lereng;
        $d = $request->ketinggian_lokasi;
        $e = $request->penggunaan_lahan;
        
        // Jenis Tanah
        // Menentukan Kelas dan Nilai x
        if ($a == 'Inceptisol Ultisol') {
            $a_kelas = 'Tidak Peka';
            $a_x = 5;

        } elseif ($a == 'Mediteran') {
            $a_kelas = 'Kurang Peka';
            $a_x = 15;

        } elseif ($a == 'Andosol, grumosol') {
            $a_kelas = 'Peka';
            $a_x = 25;

        } elseif ($a == 'Regosol') {
            $a_kelas = 'Sangat Peka';
            $a_x = 38;

        }
        // Menghitung Derajat Keanggotaan
        if ($a_x <= 10) {
            $a_dk = (10 - $a_x) / 10;

        } elseif (10 < $a_x && $a_x <= 20) {
            $a_dk = ($a_x - 10) / 10;

        } elseif (20 < $a_x && $a_x <= 30) {
            $a_dk = (30 - $a_x) / 10;

        } elseif ($a_x > 30) {
            $a_dk = 1;

        }

        // Curah Hujan
        // Menentukan Kelas dan Nilai x
        if ($b == 0) {
            $b_kelas = 'Tidak Ada Hujan';
            $b_x = 0;

        } elseif ($b >= 0 && $b <= 100) {
            $b_kelas = 'Rendah';
            $b_x = 15;

        } elseif ($b >= 101 && $b <= 300) {
            $b_kelas = 'Menengah';
            $b_x = 20;

        } elseif ($b >= 301 && $b <= 400) {
            $b_kelas = 'Tinggi';
            $b_x = 35;

        } elseif ($b > 400) {
            $b_kelas = 'Sangat Tinggi';
            $b_x = 45;

        }
        // Menghitung Derajat Keanggotaan
        if (0 <= $b_x && $b_x <= 10) {
            $b_dk = (10 - $b_x) / 10;

        } elseif (10 < $b_x && $b_x <= 20) {
            $b_dk = ($b_x - 10) / 10;

        } elseif (20 < $b_x && $b_x <= 30) {
            $b_dk = (30 - $b_x) / 10;

        } elseif (30 < $b_x && $b_x <= 40) {
            $b_dk = (40 - $b_x) / 10;

        } elseif ($b_x >= 40) {
            $b_dk = 1;
        }

        // Kemiringan Lereng
        // Menentukan Kelas dan Nilai x
        if ($c >= 0 && $c <= 8) {
            $c_kelas = 'Datas';
            $c_x = 0;

        } elseif ($c >= 8 && $c <= 15) {
            $c_kelas = 'Landai';
            $c_x = 15;

        } elseif ($c >= 15 && $c <= 25) {
            $c_kelas = 'Agak Curam';
            $c_x = 25;

        } elseif ($c >= 25 && $c <= 40) {
            $c_kelas = 'Curam';
            $c_x = 35;

        } elseif ($c > 40) {
            $c_kelas = 'Sangat Tinggi';
            $c_x = 45;

        }
        // Menghitung Derajat Keanggotaan
        if (0 <= $c_x && $c_x <= 10) {
            $c_dk = (10 - $c_x) / 10;

        } elseif (10 < $c_x && $c_x <= 20) {
            $c_dk = ($c_x - 10) / 10;

        } elseif (20 < $c_x && $c_x <= 30) {
            $c_dk = (30 - $c_x) / 10;

        } elseif (30 < $c_x && $c_x <= 40) {
            $c_dk = (40 - $c_x) / 10;

        } elseif ($c_x >= 40) {
        
            $c_dk = 1;
        }

        // Ketinggian Lokasi
        // Menentukan Kelas dan Nilai x
        if ($d < 1000) {
            $d_kelas = 'Sangat Rendah';
            $d_x = 0;

        } elseif ($d >= 1000 && $d <= 1500) {
            $d_kelas = 'Rendah';
            $d_x = 15;

        } elseif ($d >= 1500 && $d <= 2000) {
            $d_kelas = 'Sedang';
            $d_x = 25;

        } elseif ($d >= 2000 && $d <= 2500) {
            $d_kelas = 'Tinggi';
            $d_x = 35;

        } elseif ($d > 2500) {
            $d_kelas = 'Sangat Tinggi';
            $d_x = 45;

        }
        // Menghitung Derajat Keanggotaan
        if (0 <= $d_x && $d_x <= 10) {
            $d_dk = (10 - $d_x) / 10;

        } elseif (10 < $d_x && $d_x <= 20) {
            $d_dk = ($d_x - 10) / 10;

        } elseif (20 < $d_x && $d_x <= 30) {
            $d_dk = (30 - $d_x) / 10;

        } elseif (30 < $d_x && $d_x <= 40) {
            $d_dk = (40 - $d_x) / 10;

        } elseif ($d_x >= 40) {
            $d_dk = 1;
        }

        // Penggunaan lahan
        // Menentukan Kelas dan Nilai x
        if ($e == 'Hutan') {
            $e_kelas = 'Kurang Peka';
            $e_x = 0;

        } elseif ($e == 'Perkebunan') {
            $e_kelas = 'Peka';
            $e_x = 18;

        } elseif ($e == 'Pemukiman Tinggal') {
            $e_kelas = 'Sangat Peka';
            $e_x = 25;

        }
        // Menghitung Derajat Keanggotaan
        if (0 <= $e_x && $e_x <= 10) {
            $e_dk = (10 - $e_x) / 10;

        } elseif (10 < $e_x && $e_x <= 20) {
            $e_dk = ($e_x - 10) / 10;

        } elseif ($e_x >= 20) {
            $e_dk = 1;

        }

        // Menghitung Defuzzifikasi dengan metode centroid method / center of grafity 
        $y = (($a_x * $a_dk) + ($b_x * $b_dk) + ($c_x * $c_dk) + ($d_x * $d_dk) + ($e_x * $e_dk))
                            / (($a_dk + $b_dk + $c_dk + $d_dk + $e_dk) * 5);
        if ($y <= 3.40) {
            $y_kelas = 'Tidak Rawan';
        } elseif ($y > 3.40 && $y <= 5.40) {
            $y_kelas = 'Rawan Sedang';
        } elseif ($y > 5.40) {
            $y_kelas = 'Rawan Tinggi';
        }

        // Memasukan hasil perhitungan kedalam variable $data untuk disimpan ke database
        $data['tingkat_kerawanan'] = $y_kelas;

        return $data;
    }
}
