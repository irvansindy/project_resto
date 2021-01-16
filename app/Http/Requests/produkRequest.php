<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class produkRequest extends FormRequest
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
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:4000',
            'jenis' => 'required',
            'harga' => 'required',
        ];
    }
}
