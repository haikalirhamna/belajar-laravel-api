<?php

namespace App\Http\Requests\Api\Blog;

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
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'mimes' => ':attribute harus berekstensi jpg, jpeg, atau png'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'judul',
            'content' => 'isi',
            'image' => 'foto'
        ];
    }
}
