<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div style="background-color: #1bd9ff; padding: 40px; border-radius: 15px; max-width: 600px; margin: 0 auto;">
        <a class="navbar-brand" href="{{ config('custom.app.root') }}/">
            <img src="{{ asset('images/bpulogo.png') }}" width="360px" height="auto" class="d-inline-block align-center" id="nav-image-logo" alt="">
        </a>

        <h1 style="text-align: center; color: rgb(255, 255, 255); font-size: 1.5rem; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            Trainee Log In System
        </h1>

        <form method="POST" action="{{ route('login') }}" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 15px; border: 2px solid black;">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" style="color: black;" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border: 2px solid black; color: black; background-color: white;" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: black;" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" style="color: black;" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="border: 2px solid black; color: black; background-color: white;" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: black;" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-black text-black shadow-sm focus:ring-black" name="remember">
                    <span class="ms-2 text-sm" style="color: black;">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm" style="color: black; hover:text-gray-900; rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3" style="background-color: black; border: 2px solid rgba(0, 187, 255, 0.998); color: rgba(0, 187, 255, 0.998);">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
