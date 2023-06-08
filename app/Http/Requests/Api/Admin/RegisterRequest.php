<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|unique:admins,username',
            'name' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
        'unique' => ':attribute sudah ada'
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'username',
            'name' => 'Nama',
            'password' => 'Kata Sandi'
        ];
    }
}
