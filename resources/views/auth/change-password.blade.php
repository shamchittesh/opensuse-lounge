@extends('layouts.authenticated')

@section('content')
<div class="max-w-md mx-auto space-y-6">
    <!-- Page Header -->
    <div class="text-center">
        <h1 class="text-3xl font-bold text-primary">Change Your Password</h1>
        <p class="mt-2 text-sm text-secondary">
            Please set a new password to continue
        </p>
    </div>

    <!-- Change Password Card -->
    <x-card>
        @if ($errors->any())
            <x-alert type="error" :dismissible="false">
                <p class="font-medium mb-2">There were errors with your submission</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-alert>
        @endif

        <form method="POST" action="{{ route('password.change') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- New Password Input -->
            <x-input
                label="New Password"
                name="password"
                type="password"
                placeholder="Enter your new password"
                helpText="Must be at least 8 characters long"
                required
                autofocus
            />

            <!-- Confirm Password Input -->
            <x-input
                label="Confirm Password"
                name="password_confirmation"
                type="password"
                placeholder="Confirm your new password"
                required
            />

            <!-- Submit Button -->
            <x-button type="submit" variant="primary" class="w-full">
                Change Password
            </x-button>
        </form>
    </x-card>
</div>
@endsection
