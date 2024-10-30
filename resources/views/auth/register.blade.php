<x-guest-layout>
    <div style="background-color: #00d5ff; padding: 40px; border-radius: 15px; max-width: 600px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 30px;">
            <a class="navbar-brand" href="{{ config('custom.app.root') }}/">
                <img src="{{ asset('images/bpulogo.png') }}" width="360px" height="auto" class="d-inline-block align-center" id="nav-image-logo" alt="">
            </a>
        </div>

        <h1 style="text-align: center; color: rgb(255, 255, 255); font-size: 1.5rem; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            Trainee Registration System
        </h1>

        <form method="POST" action="{{ route('register') }}" style="background-color: rgba(255, 255, 255, 0.998); padding: 20px; border-radius: 15px; border: 2px solid black;">
            @csrf

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" style="color: black;" />
                <select id="role" class="block mt-1 w-full" name="role" :value="old('role')" required autofocus autocomplete="role" style="border: 2px solid black; color: black; background-color: white;">
                    <option value="user" selected>Division Admin</option>
                    <option value="Admin">Super Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" style="color: black;" />
            </div>
            
            <!-- Division 
            <div class="mt-4" >
                <x-input-label for="division" :value="__('Division')" style="color: black;" />
                <select id="division_id" class="block mt-1 w-full" name="division_id"  style="border: 2px solid black; color: black; background-color: white;">
                    @foreach ($divisiones as $division)
                        <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('division')" class="mt-2" style="color: black;" />
            </div> -->
                
               
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" style="color: black;" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="border: 2px solid black; color: black; background-color: white;" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: black;" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" style="color: black;" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="border: 2px solid black; color: black; background-color: white;" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: black;" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" style="color: black;" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="border: 2px solid black; color: black; background-color: white;" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: black;" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="color: black;" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" style="border: 2px solid black; color: black; background-color: white;" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: black;" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm" style="color: black; hover:text-gray-900; rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4" style="background-color: black; border: 2px solid rgba(0, 187, 255, 0.998); color: rgba(0, 187, 255, 0.998);">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
