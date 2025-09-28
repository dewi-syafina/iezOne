<x-guest-layout pageTitle="Daftar Akun Baru">
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-white" />
            <x-text-input id="name" class="block mt-1 w-full input-glass rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 error-text" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" class="block mt-1 w-full input-glass rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Masukkan email sekolah Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error-text" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-white" />
            <x-text-input id="password" class="block mt-1 w-full input-glass rounded-lg" type="password" name="password" required autocomplete="new-password" placeholder="Buat password aman" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 error-text" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-white" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full input-glass rounded-lg" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error-text" />
        </div>

        <!-- Tombol Submit (Estetik Hover) -->
        <div class="flex items-center justify-end mt-8">
            <x-primary-button class="w-full bg-white/10 text-white hover-lift glass-effect border border-white/20 rounded-lg transition-all duration-300">
                {{ __('Daftar Akun') }}
            </x-primary-button>
        </div>

        <!-- Link ke Login -->
        <p class="text-center text-white/70 text-sm mt-6">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-semibold text-white hover:text-white/80 underline transition-colors">
                Masuk sekarang
            </a>
        </p>
    </form>

    @if (isset($footer))
        {{ $footer }}
    @endif
</x-guest-layout>