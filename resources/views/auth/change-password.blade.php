<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Change Password - {{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <h1>Change Your Password</h1>

    <p>Please set a new password to continue.</p>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.change') }}">
        @csrf
        @method('PUT')

        <div>
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" required autofocus>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Change Password</button>
    </form>
</body>
</html>
