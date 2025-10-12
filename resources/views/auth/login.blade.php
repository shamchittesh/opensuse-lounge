<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->

    <style>
        /* Color/gradient  (deep teal -> green) */
        :root{
            --teal-900: #052f2b;
            --teal-800: #00594dff;
            --teal-700: #0b3f37;
            --accent: #7ad3b0;
            --card-glass: rgba(3,34,30,0.64);
        }

        html,body{
            height:100%;
            margin:0;
            background:
                radial-gradient(900px 500px at 10% 12%, rgba(202, 255, 67, 0.39), transparent),
                radial-gradient(1000px 380px at 92% 82%, rgba(135, 160, 12, 0.12), transparent),
                linear-gradient(180deg,var(--teal-900) 0%, var(--teal-800) 30%, var(--teal-700) 100%);
        }

        /* Card styling  */
        .login-card{
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            background-color: var(--card-glass);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(2,6,23,0.55), inset 0 1px 0 rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.04);
        }

        h1.login-title{
            color: #ffffff;
            font-weight: 700;
            text-align: center;
            text-shadow: 0 10px 30px rgba(2,6,23,0.6);
        }

        p.login-sub{
            color: rgba(220,255,235,0.82);
            text-align:center;
        }

        /* Inputs: darker green with subtle glow on focus */
        .input-emerald{
            background: rgba(6,54,45,0.55);
            border: 1px solid rgba(255,255,255,0.04);
            color: #e9fff5;
        }
        .input-emerald:focus{
            box-shadow: 0 8px 30px rgba(122,211,176,0.06);
            border-color: rgba(122,211,176,0.35);
            outline: none;
        }

        @media (max-width:640px){
            .login-card{ padding:1.5rem; border-radius:16px; }
            h1.login-title{ font-size:1.5rem; }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <!-- Login Card -->
    <div class="w-full max-w-md space-y-6 login-card" style="background: linear-gradient(90deg, #408157, #0D7065);">

        <h1 class="text-5xl login-title text-[CDEDEA]">Lounge</h1>


        <p class="login-sub text-sm">Sign in to access your account</p>

        @if ($errors->any())
            <div class="p-3 text-sm text-red-700 bg-red-100 rounded-md">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-green-100 text-sm font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 rounded-xl border input-emerald placeholder-green-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"/>
            </div>

            <div>
                <label for="password" class="block text-green-100 text-sm font-medium mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 rounded-xl border input-emerald placeholder-green-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent"/>
            </div>

            <div class="flex items-center justify-between text-green-200 text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded text-green-400">
                    <span class="ml-2">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3 bg-teal-700 hover:bg-teal-900 rounded-xl">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
