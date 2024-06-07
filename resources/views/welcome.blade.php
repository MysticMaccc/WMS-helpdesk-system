<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-sky-400 flex flex-col gap-4">

    <div class="basis-3/12">
        <h2 class="text-zinc-800 font-bold 
        md:text-2xl md:ml-24 lg:text-2xl lg:ml-24 ">DOTS PER INCH</h2>
    </div>

    <div class="basis-5/12 mx-auto rounded-full px-4 py-4 shadow-2xl shadow-zinc-950 bg-slate-200">

        <img class="rounded-full w-44 h-44" src="{{ asset('storage/system/DPI.png') }}" alt="DPI Logo">

    </div>

    <div class="basis-3/12 mx-auto">
        <h2 class="text-zinc-800 font-bold text-xl md:text-4xl lg:text-4xl">Welcome to Helpdesk System</h2>
    </div>

    <div class="basis-3/12 mx-auto border-2 ">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-full bg-sky-700 text-slate-100 text-xl px-28 py-2 shadow-xl shadow-gray-600
        hover:bg-sky-900 hover:text-slate-50 hover:shadow-gray-900">
                    Log In
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-full bg-sky-700 text-slate-100 text-xl px-28 py-2 shadow-xl shadow-gray-600 no-underline
                             hover:bg-sky-900 hover:text-slate-50 hover:shadow-gray-900">
                    Login
                </a>
            @endauth
        @endif
    </div>

    @livewireScripts
</body>

</html>
