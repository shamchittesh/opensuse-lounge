<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? config('app.name', 'openSUSE Lounge') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=source-sans-3:400,500,600,700" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col bg-gradient-opensuse">
        <!-- Navigation -->
        @yield('navigation')
        
        <!-- Flash Messages -->
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif
        
        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif
        
        <!-- Main Content -->
        @yield('main')
        
        <!-- Footer -->
        <footer class="@yield('footer-class', 'bg-card border-t border-default') mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <p class="text-center text-sm text-secondary">
                    &copy; {{ date('Y') }} openSUSE Project. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>

