<?php

namespace App\Http\Requests\HasilPemeriksaan;

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
            'no_rm' => "required",
            'keluhan' => "required",
            'diagnosa' => "required",
            'terapi' => "required",
            'keterangan'  => "required",
        ];
    }

    public function attributes()
    {
        return [
            'no_rm' => 'Pasien',
        ];
    }
}
