<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Help-Desk') }}</title> --}}
        <title>Help-Desk</title>
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <!-- BEGIN: Vendor JS Assets-->
        <script src="{{ asset('dist/js/vendors/dom.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/tailwind-merge.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/lucide.js') }}"></script>
        <script src="{{ asset('dist/js/vendors/modal.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/theme-color.js') }}"></script>
        <script src="{{ asset('dist/js/components/base/lucide.js') }}"></script> <!-- END: Vendor JS Assets-->
        @include('layouts.scripts.scripts')
        @livewireScripts
    </body>             
</html>
