<?php

namespace App\Http\Requests\Pasien;

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
            'ktp' => 'required|unique:users,ktp',
            'name' => 'required',
            'nama_kk' => 'required',
            'no_hp' => 'required',
            'email' => 'required|unique:users,email|email',
            'username' => 'required|unique:users,username',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'kepesertaan' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama Pasien',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nama_kk' => 'Nama KK',
            'no_hp' => 'Nomor Handphone',
        ];
    }
}
