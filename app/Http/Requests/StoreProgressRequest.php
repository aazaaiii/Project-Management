<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tanggal' => ['required', 'date'],
            'keterangan' => ['required', 'string'],
            'persentase' => ['required', 'integer', 'min:0', 'max:100'],
            'foto.*' => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal.required' => 'Tanggal wajib diisi.',
            'keterangan.required' => 'Keterangan progress wajib diisi.',
            'persentase.required' => 'Persentase wajib diisi.',
            'persentase.max' => 'Persentase maksimal 100%.',
            'foto.*.image' => 'File harus berupa gambar.',
            'foto.*.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}