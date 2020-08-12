<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
            'nama'=> 'required|min:3|max:100',
            'category_id'=>'required',
            'harga'=> 'required',
            'deskripsi'=> '',
            'foto'=> 'required' // 'max:2048'
        ];
    }
}
