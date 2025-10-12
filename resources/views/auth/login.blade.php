@extends('layouts.guest')

@section('content')
<div class="max-w-md mx-auto h-full flex flex-col justify-center">
    <!-- Login Card -->
    <div class="bg-card/95 backdrop-blur-sm rounded-2xl shadow-brand-lg border border-default overflow-hidden animate-fade-in">
        <!-- Card Header -->
        <div class="px-8 pt-8 pb-6 text-center">
            <h2 class="text-3xl font-bold text-primary mb-2">
                Welcome Back
            </h2>
            <p class="text-secondary">
                Sign in to openSUSE Lounge
            </p>
        </div>

        <!-- Card Body -->
        <div class="px-8 pb-8">
            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 p-4">
                    <div class="flex items-start">
                        <svg class="h-5 w-5 text-red-600 dark:text-red-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div class="ml-3 flex-1">
                            <h3 class="text-sm font-medium text-red-800 dark:text-red-200 mb-2">
                                There were errors with your submission
                            </h3>
                            <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Input -->
                <x-input 
                    label="Email Address"
                    name="email"
                    type="email"
                    placeholder="your@email.com"
                    :value="old('email')"
                    required
                    autofocus
                />

                <!-- Password Input -->
                <x-input 
                    label="Password"
                    name="password"
                    type="password"
                    placeholder="Enter your password"
                    required
                />

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 text-accent border-default rounded focus:ring-accent focus:ring-offset-0 transition-colors">
                        <span class="ml-2 text-sm text-primary group-hover:text-accent transition-colors">
                            Remember me
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <x-button type="submit" variant="primary" class="w-full">
                    Sign In
                </x-button>
            </form>
        </div>
    </div>

    <!-- Quick Login Hint (for development) -->
    @if(config('app.debug'))
        <x-alert type="info">
            <p class="text-sm font-medium mb-2">Development Quick Login</p>
            <p class="text-xs font-mono">admin@example.com / password</p>
        </x-alert>
    @endif
</div>
@endsection
