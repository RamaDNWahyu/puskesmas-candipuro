<?php

namespace App\Http\Requests\Obat;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'no_rm' => 'required',
            'jenis_kunjungan' => 'required',
        ];
    }

    /* public function attributes()
    {
        return [
            'kode' => 'Kode Obat',
            'jenis' => 'Jenis Obat',
            'name' => 'Nama Obat',
        ];
    } */
}
