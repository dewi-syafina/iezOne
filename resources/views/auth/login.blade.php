<x-guest-layout pageTitle="Masuk ke Akun">
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" class="block mt-1 w-full input-glass rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error-text" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-white" />
            <x-text-input id="password" class="block mt-1 w-full input-glass rounded-lg" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 error-text" />
        </div>

        <!-- Remember Me & Forgot Password (Checkbox Native Estetik) -->
        <div class="flex items-center justify-between">
            <!-- Checkbox Native dengan Glass Effect (Menarik & Tanpa Error) -->
            <label for="remember" class="flex items-center cursor-pointer text-white/80 group">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} 
                       class="w-4 h-4 text-white bg-white/10 border-2 border-white/30 rounded focus:ring-white/50 focus:ring-2 transition-all duration-200 glass-effect hover:bg-white/20" />
                <span class="ml-2 text-sm select-none">{{ __('Ingat Saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-white/80 hover:text-white underline text-sm transition-colors">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>

        <!-- Tombol Submit (Estetik Hover) -->
        <div class="flex items-center justify-end mt-8">
            <x-primary-button class="w-full bg-white/10 text-white hover-lift glass-effect border border-white/20 rounded-lg transition-all duration-300">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>

        <!-- Link ke Register -->
        <p class="text-center text-white/70 text-sm mt-6">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="font-semibold text-white hover:text-white/80 underline transition-colors">
                Daftar sekarang
            </a>
        </p>
    </form>

    @if (isset($footer))
        {{ $footer }}
    @endif
</x-guest-layout>