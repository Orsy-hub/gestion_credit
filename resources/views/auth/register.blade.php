<x-guest-layout>
    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data"> {{--Mettre la route se trouvant dans web.php--}}
        @csrf

        <!-- Name. -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address. -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rôle.-->
        <div class="mt-4">
            <select id="role" name="role" class="w-full rounded-lg border-gray-300">
                <option value="">Sélectionnez un rôle</option>
                <option value="Emprunteur">Emprunteur</option>
                <option value="Bayeur">Bayeur</option>
            </select>
        </div>
        
        <!-- Solde (visible uniquement pour Bayeur). -->
        <div id="soldeField" style="display: none;" class="mt-4">
            <label for="solde">Solde initial</label>
            <input type="number" name="solde" id="solde" min="0" class="w-full rounded-lg border-gray-300">
        </div>

        <!-- Image de profile. -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Image de profil')" />
            <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        {{-- Champ caché de vérification --}}
        <input type="hidden" name="verifier" value="0">

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <p class="mt-2">Pour le rôle saisissez: Emprunteur ou Bayeur</p>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.getElementById('role').addEventListener('change', function() {
            let soldeField = document.getElementById('soldeField');
            let soldeInput = document.getElementById('solde');
    
            if (this.value === 'Bayeur') {
                soldeField.style.display = 'block';
                soldeInput.removeAttribute('disabled');
            } else {
                soldeField.style.display = 'none';
                soldeInput.setAttribute('disabled', true);
                soldeInput.value = '0';
            }
        });
    </script>
    
</x-guest-layout>
