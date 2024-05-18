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
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tippy.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/litepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/themes/rubick/side-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/components/mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"> <!-- END: CSS Assets-->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body>
    
    <div class="rubick px-5 sm:px-8 py-5 before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 before:fixed before:inset-0 before:z-[-1]">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu group top-0 inset-x-0 fixed bg-theme-1/90 z-[60] border-b border-white/[0.08] dark:bg-darkmode-800/90 md:hidden before:content-[''] before:w-full before:h-screen before:z-10 before:fixed before:inset-x-0 before:bg-black/90 before:transition-opacity before:duration-200 before:ease-in-out before:invisible before:opacity-0 [&.mobile-menu--active]:before:visible [&.mobile-menu--active]:before:opacity-100">
            <div class="flex h-[70px] items-center px-3 sm:px-8">
                <a class="mr-auto flex" href="">
                    <img class="w-6" src="{{ asset('dist/images/logo.svg') }}" alt="Midone - Tailwind Admin Dashboard Template">
                </a>
                <a class="mobile-menu-toggler" href="#">
                    <i data-tw-merge="" data-lucide="bar-chart2" class="stroke-1.5 h-8 w-8 -rotate-90 transform text-white"></i>
                </a>
            </div>
            <div class="scrollable h-screen z-20 top-0 left-0 w-[270px] -ml-[100%] bg-primary transition-all duration-300 ease-in-out dark:bg-darkmode-800 [&[data-simplebar]]:fixed [&_.simplebar-scrollbar]:before:bg-black/50 group-[.mobile-menu--active]:ml-0">
                <a href="#" class="fixed top-0 right-0 mt-4 mr-4 transition-opacity duration-200 ease-in-out invisible opacity-0 group-[.mobile-menu--active]:visible group-[.mobile-menu--active]:opacity-100">
                    <i data-tw-merge="" data-lucide="x-circle" class="stroke-1.5 mobile-menu-toggler h-8 w-8 -rotate-90 transform text-white"></i>
                </a>
                <x-mobile-sidebar />
            </div>
        </div>
        <!-- END: Mobile Menu -->
        <div class="mt-[4.7rem] flex md:mt-0">
            <!-- BEGIN: Side Menu -->
           <x-sidebar />
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
                {{ $slot }}
            </div>
            <!-- END: Content -->
        </div>
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
    <script src="{{ asset('dist/js/themes/rubick.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/leaflet-map-loader.js') }}"></script>
    <script src="{{ asset('dist/js/components/mobile-menu.js') }}"></script>
    <script src="{{ asset('dist/js/components/themes/rubick/top-bar.js') }}"></script>
    <!-- END: Vendor JS Assets-->
</body>

</html>
