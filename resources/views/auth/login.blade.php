<x-guest-layout>
    <form method="POST" action="{{ route('login.custom') }}">
        @csrf

        <!-- Pilih Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Login sebagai')" />
            <select id="role" name="role" required
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                <option value="">-- Pilih Role --</option>
                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="orangtua" {{ old('role') == 'orangtua' ? 'selected' : '' }}>Orang Tua</option>
                <option value="wali_kelas" {{ old('role') == 'wali_kelas' ? 'selected' : '' }}>Wali Kelas</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- NIS untuk siswa -->
        <div id="nis-field" class="mt-4 {{ old('role') !== 'siswa' ? 'hidden' : '' }}">
            <x-input-label for="nis" :value="__('NIS')" />
            <x-text-input id="nis" class="block mt-1 w-full"
                          type="text" name="nis" :value="old('nis')" autofocus />
            <x-input-error :messages="$errors->get('nis')" class="mt-2" />
        </div>

        <!-- Email untuk orang tua / wali kelas -->
        <div id="email-field" class="mt-4 {{ in_array(old('role'), ['orangtua','wali_kelas']) ? '' : 'hidden' }}">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 flex items-center">
            <input id="remember_me" type="checkbox"
                   class="rounded border-gray-300 text-emerald-600 shadow-sm focus:ring-emerald-500"
                   name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-emerald-600 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script ganti field sesuai role -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const nisField = document.getElementById('nis-field');
            const emailField = document.getElementById('email-field');

            function toggleFields() {
                if (roleSelect.value === 'siswa') {
                    nisField.classList.remove('hidden');
                    emailField.classList.add('hidden');
                } else if (roleSelect.value === 'orangtua' || roleSelect.value === 'wali_kelas') {
                    nisField.classList.add('hidden');
                    emailField.classList.remove('hidden');
                } else {
                    nisField.classList.add('hidden');
                    emailField.classList.add('hidden');
                }
            }

            roleSelect.addEventListener('change', toggleFields);
            toggleFields(); // jalankan saat halaman pertama kali load
        });
    </script>
</x-guest-layout>
