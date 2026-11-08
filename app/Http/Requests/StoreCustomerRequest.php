<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('customer')?->user_id;
        $isEdit = $this->isMethod('PUT') || $this->isMethod('PATCH');

        $existingUser = User::where('email', $this->input('email'))->first();

        $emailRules = [
            'required',
            'email',
            'max:255',
        ];

        if ($isEdit) {
            $emailRules[] = Rule::unique('users', 'email')->ignore($userId);
        }

        $passwordRules = ($isEdit || $existingUser)
            ? ['nullable', 'string', 'min:8']
            : ['required', 'string', 'min:8'];

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => $emailRules,
            'password' => $passwordRules,
            'no_whatsapp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi untuk akun baru.',
            'password.min' => 'Password minimal 8 karakter.',
        ];
    }
}
