<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/tippy.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/litepicker.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/tiny-slider.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/themes/icewall/side-nav.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/leaflet.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/components/mobile-menu.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/css/app.css')}}"> <!-- END: CSS Assets-->

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

            <!-- BEGIN: Vendor JS Assets-->
            <script src="{{ asset('dist/js/vendors/dom.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/tailwind-merge.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/lucide.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/tippy.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/dayjs.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/litepicker.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/popper.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/dropdown.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/tiny-slider.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/transition.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/chartjs.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/leaflet-map.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/axios.js') }}"></script>
            <script src="{{ asset('dist/js/utils/colors.js') }}"></script>
            <script src="{{ asset('dist/js/utils/helper.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/simplebar.js') }}"></script>
            <script src="{{ asset('dist/js/vendors/modal.js') }}"></script>
            <script src="{{ asset('dist/js/components/base/theme-color.js') }}"></script>
            <script src="{{ asset('dist/js/components/base/lucide.js') }}"></script>
            <script src="{{ asset('dist/js/components/base/tippy.js') }}"></script>
            <script src="{{ asset('dist/js/components/base/litepicker.js') }}"></script>
            <script src="{{ asset('dist/js/components/report-line-chart.js') }}"></script>
            <script src="{{ asset('dist/js/components/report-pie-chart.js') }}"></script>
            <script src="{{ asset('dist/js/components/report-donut-chart.js') }}"></script>
            <script src="{{ asset('dist/js/components/report-donut-chart-1.js') }}"></script>
            <script src="{{ asset('dist/js/components/simple-line-chart-1.js') }}"></script>
            <script src="{{ asset('dist/js/components/base/tiny-slider.js') }}"></script>
            <script src="{{ asset('dist/js/themes/icewall.js') }}"></script>
            <script src="{{ asset('dist/js/components/base/leaflet-map-loader.js') }}"></script>
            <script src="{{ asset('dist/js/components/mobile-menu.js') }}"></script>
            <script src="{{ asset('dist/js/components/themes/icewall/top-bar.js') }}"></script> 
            <!-- END: Vendor JS Assets-->
    </body>
</html>
