<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
            'txtfullname' => 'required|max:225',
            'txtgender' => 'required',
            'txtaddress' => 'required|max:225',
            'txtemail' => [
                'required',
                Rule::unique('students', 'email')->ignore($this->txtid, 'idstudents'),
                'email'
            ],
            'txtphone' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
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
            'txtfullname' => 'Full Name',
            'txtgender' => 'Gender',
            'txtadress' => 'Address',
            'txtemail' => 'Email',
            'txtphone' => 'Phone Number',

        ];
    }
}
