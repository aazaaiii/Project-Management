<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],

            'kategori' => [
                'required',
                'in:Rumah 2 Lantai,Interior,Kitchen Set,Kamar Mandi,Lainnya'
            ],

            'deskripsi' => ['nullable', 'string'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'luas_bangunan' => ['nullable', 'string', 'max:50'],
            'tahun' => ['nullable', 'digits:4', 'integer'],
            'status' => ['required', 'in:Draft,Published'],

            'thumbnail' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'thumbnail.required' => 'Thumbnail wajib diupload.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Format thumbnail harus JPG, JPEG, PNG, atau WEBP.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 5 MB.',
            'images.max' => 'Maksimal 10 foto galeri.',
            'images.*.image' => 'Semua foto galeri harus berupa gambar.',
            'images.*.mimes' => 'Format foto galeri harus JPG, JPEG, PNG, atau WEBP.',
            'images.*.max' => 'Setiap foto galeri maksimal 5 MB.',
        ];
    }
}
