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
            'NPK' => 'required|digits:5',
            'email' => 'required|email',
            'waktu_Pinjam_Mulai' => 'required|date',
            'waktu_Pinjam_Selesai' => 'required|date|after:waktu_Pinjam_Mulai',
            'keperluan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Mohon isikan nama anda',
            'NPK.digits:5' => 'Format NPK salah',
            'NPK.required' => 'Mohon isikan NPK anda',
            'email.required' => 'Mohon isikan email anda',
            'email.email' => 'Format email salah',
            'waktu_Pinjam_Mulai.required' => 'Mohon isikan tanggal dan waktu mulai',
            'waktu_Pinjam_Mulai.date' =>'format tanggal salah',
            'waktu_Pinjam_Selesai.required' => 'Mohon isikan tanggal dan waktu mulai',
            'waktu_Pinjam_Selesai.date' =>'format tanggal salah',
            'waktu_Pinjam_Selesai.after:waktu_Pinjam_Mulai' => 'tanggal selesai dan waktu harus setelah tanggal dan waktu mulai',
            'keperluan.required' => 'Mohon isikan keperluan meeting',
        ];
    }
}
