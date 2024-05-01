@extends('admin.layouts.app')

@section('content')

<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <!-- Update Profile Information -->
        @livewire('profile.update-profile-information-form')

        <x-section-border />

        <!-- Update Password -->
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
        @endif

        <x-section-border />

        <!-- Two Factor Authentication -->
        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            @livewire('profile.two-factor-authentication-form')
        @endif

        <x-section-border />

        <!-- Logout Other Browser Sessions -->
        @livewire('profile.logout-other-browser-sessions-form')

        <x-section-border />

        <!-- Delete Account -->
        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            @livewire('profile.delete-user-form')
        @endif

    </div>
</x-app-layout>


@endsection