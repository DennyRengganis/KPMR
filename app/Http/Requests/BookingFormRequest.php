<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
            'id_Ruangan' => 'required',
            'nama' => 'required',
            'NPK' => 'required',
            'email' => 'required|email',
            'waktu_Pinjam_Mulai' => 'required|date',
            'waktu_Pinjam_Selesai' => 'required|date|after:start_date',
            'keperluan' => 'required|',
        ];
    }
}
