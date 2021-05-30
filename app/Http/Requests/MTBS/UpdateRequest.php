<?php

namespace App\Http\Requests\MTBS;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'tanggal' => 'required',
            'umur_anak' => 'required',
            'gender' => 'required',
            'berat_badan' => 'required',
            'tinggi' => 'required',
            'suhu' => 'required',
            'keluhan' => 'required',
            'kunjungan_pertama' => 'required',
            'kunjungan_ulang' => 'required',
            'tanda_bahaya' => 'required',
            'batuk' => 'required',
            'batuk_lama' => 'required',
            'demam' => 'required',
            'demam_lama' => 'required',
            'diare' => 'required',
            'diare_lama' => 'required',
            'klasifikasi_bahaya_umum' => 'required',
            'tindakan_bahaya_umum' => 'required',
            'hasil_rdt' => 'required',
            'hasil_sdm' => 'required',
        ];
    }

    /* public function attributes()
    {
    } */
}
