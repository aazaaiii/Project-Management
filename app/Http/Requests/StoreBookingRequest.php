<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'jenis_layanan' => [
                'required',
                'in:Renovasi Rumah,Bangun Rumah Baru,Desain Interior,Kitchen Set,Desain 3D,Konsultasi'
            ],
            'tanggal_survey' => [
                'nullable',
                'date',
                'after_or_equal:today'
            ],
            'pesan' => [
                'nullable',
                'string',
                'max:1000'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'jenis_layanan.required' => 'Silakan pilih jenis layanan.',
            'jenis_layanan.in' => 'Jenis layanan tidak valid.',
            'tanggal_survey.after_or_equal' => 'Tanggal survey tidak boleh tanggal yang sudah lewat.',
            'pesan.max' => 'Pesan maksimal 1000 karakter.',
        ];
    }
}