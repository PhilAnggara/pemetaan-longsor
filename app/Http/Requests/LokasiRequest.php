<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LokasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_user' => 'required|integer|exists:user,id',
            'nama_lokasi' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'jenis_tanah' => 'required|max:255',
            'curah_hujan' => 'required|max:255',
            'kemiringan_lereng' => 'required|max:255',
            'ketinggian_lokasi' => 'required|max:255',
            'penggunaan_lahan' => 'required|max:255',
            'tingkat_kerawanan' => 'required|max:255'
        ];
    }
}
