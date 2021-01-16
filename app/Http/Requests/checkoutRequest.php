<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutRequest extends FormRequest
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
            // 'id_kasir' => 'required',
            'id_tempat' => 'required',
            'no_telepon' => 'required',
            'total_transaksi' => 'required|integer',
            'transaksi_detail' => 'required|array',
            'transaksi_detail.*' => 'integer|exists:produk,id,harga',
        ];
    }
}
