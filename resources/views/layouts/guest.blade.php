@extends('layouts.base')

@section('navigation')
<header class="bg-canvas backdrop-blur-sm border-b border-default">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <img src="/images/logo-with-wordmark.svg" 
                     alt="openSUSE" 
                     class="h-8 dark:invert transition-transform group-hover:scale-105">
            </a>
            
            <!-- Navigation -->
            @guest
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="text-primary hover:text-brand font-medium transition-colors">
                        Sign In
                    </a>
                </div>
            @else
                <div class="flex items-center space-x-4">
                    <a href="{{ route('members.index') }}" 
                       class="text-primary hover:text-brand font-medium transition-colors">
                        Dashboard
                    </a>
                </div>
            @endguest
        </div>
    </div>
</header>
@endsection

@section('main')
<main class="flex px-4 sm:px-6 lg:px-8 py-12 flex-1">
    <div class="w-full">
        @yield('content')
    </div>
</main>
@endsection

@section('footer-class', '')

