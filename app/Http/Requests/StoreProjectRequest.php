<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'nama_project' => ['required', 'string', 'max:255'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'jenis_renovasi' => ['required', 'string'],
            'total_biaya' => ['nullable', 'numeric', 'min:0'],
            'tanggal_mulai' => ['nullable', 'date'],
            'estimasi_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'status' => ['required', 'in:Menunggu,Sedang Pengerjaan,Selesai,Batal'],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'Silakan pilih customer.',
            'customer_id.exists' => 'Customer yang dipilih tidak valid.',
            'nama_project.required' => 'Nama project wajib diisi.',
            'jenis_renovasi.required' => 'Jenis renovasi wajib diisi.',
            'estimasi_selesai.after_or_equal' => 'Estimasi selesai tidak boleh sebelum tanggal mulai.',
        ];
    }
}