<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight bg-blue-600 p-4 rounded-md shadow-md">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold text-blue-600 border-b pb-2 mb-4">Update Profile Information</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold text-blue-600 border-b pb-2 mb-4">Update Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Account -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <h3 class="text-xl font-semibold text-blue-600 border-b pb-2 mb-4">Delete Account</h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* Custom Styles for Blue Theme */
    .bg-blue-600 {
        background-color: #2f9aff;
    }
    .text-blue-600 {
        color: #1E3A8A;
    }
    .rounded-lg {
        border-radius: 0.5rem;
    }
    .shadow-lg {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .shadow-md {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .border-b {
        border-bottom: 1px solid #E5E7EB;
    }
    .p-6 {
        padding: 1.5rem;
    }
    .text-xl {
        font-size: 1.25rem;
    }
    .font-semibold {
        font-weight: 600;
    }
</style>
