@extends('layouts.guest')

@section('content')
<div class="max-w-6xl mx-auto space-y-16 h-full flex flex-col items-center justify-center">
    <!-- Hero Section -->
    <div class="text-center space-y-6 animate-fade-in">
        <h1 class="text-5xl md:text-6xl font-bold text-primary">
            openSUSE Lounge
        </h1>
        <p class="text-xl md:text-2xl text-secondary max-w-3xl mx-auto">
            A simple membership management system for the openSUSE community
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <x-button href="https://github.com/opensuse/opensuse-lounge" variant="outline" size="lg" target="_blank">
                GitHub
            </x-button>            
            @auth
                <x-button href="{{ route('members.index') }}" variant="primary" size="lg">
                    Go to Dashboard
                </x-button>
            @else
                <x-button href="{{ route('login') }}" variant="primary" size="lg">
                    Sign In
                </x-button>
            @endauth
        </div>
    </div>
</div>
@endsection