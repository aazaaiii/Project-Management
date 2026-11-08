```blade
<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-gray-800">Daftar Akun Customer</h2>
        <p class="text-sm text-gray-500 mt-1">
            Buat akun untuk melakukan booking konsultasi JOELL_PROJECT.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- WhatsApp -->
        <div class="mt-4">
            <x-input-label for="no_whatsapp" value="Nomor WhatsApp" />

            <x-text-input
                id="no_whatsapp"
                class="block mt-1 w-full"
                type="text"
                name="no_whatsapp"
                :value="old('no_whatsapp')"
                required
                placeholder="Contoh: 081234567890"
            />

            <x-input-error :messages="$errors->get('no_whatsapp')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="alamat" value="Alamat Lengkap" />

            <textarea
                id="alamat"
                name="alamat"
                rows="3"
                required
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Masukkan alamat lengkap"
            >{{ old('alamat') }}</textarea>

            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-between mt-6">
            <a
                class="text-sm text-blue-600 hover:text-blue-800 underline"
                href="{{ route('login') }}"
            >
                Sudah punya akun? Login
            </a>

            <x-primary-button>
                Daftar Sekarang
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
```