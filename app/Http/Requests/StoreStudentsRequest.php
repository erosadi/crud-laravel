<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'txtid' => 'required|unique:students,idstudents|min:7|max:7',
            'txtfullname' => 'required|max:225',
            'txtgender' => 'required',
            'txtaddress' => 'required|max:225',
            'txtemail' => 'required|email|unique:students,idstudents',
            'txtphone' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'txtid.required' => ':attribute Tidak Boleh Kosong',
            'txtid.unique' => ':attribute Sudah Ada',
            'txtid.min' => ':attribute Terlalu Pendek Minimal 7 Karakter',
            'txtid.max' => ':attribute Terlalu Panjang Maksimal 7 Karakter',
            'txtfullname.required' => ':attribute Tidak Boleh Kosong',
            'txtfullname.max' => ':attribute Terlalu Panjang Maksimal 225 Karakter',
            'txtgender.required' => ':attribute Pilih Salah Satu',
            'txtaddress.required' => ':attribute Tidak Boleh Kosong',
            'txtgender.max' => ':attribute Terlalu Panjang Maksimal 225 Karakter',
            'txtemail.required' => ':attribute Tidak Boleh Kosong',
            'txtemail.email' => ':attribute Format Harus Email',
            'txtemail.unique' => ':attribute Sudah Ada',
            'txtphone.required' => ':attribute Tidak Boleh Kosong',
            'txtphone.numeric' => ':attribute Format Harus Angka',
        ];
    }

    public function attributes(): array
    {
        return [
            'txtid' => 'ID Students',
            'txtfullname' => 'Full Name',
            'txtgender' => 'Gender',
            'txtadress' => 'Address',
            'txtemail' => 'Email',
            'txtphone' => 'Phone Number',

        ];
    }

}
