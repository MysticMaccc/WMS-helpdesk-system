@props(['title'])
<section>
    <div class="relative z-[45] flex h-[67px] items-center border-b border-slate-200">
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="flex -intro-x mr-auto  sm:flex">
            <ol class="flex items-center text-theme-1 dark:text-slate-300">
                <li class="">
                    <a href="">Application</a>
                </li>
                <li
                    class="relative ml-5 pl-0.5 before:content-[''] before:w-[14px] before:h-[14px] before:bg-chevron-black before:transform before:rotate-[-90deg] before:bg-[length:100%] before:-ml-[1.125rem] before:absolute before:my-auto before:inset-y-0 dark:before:bg-chevron-white text-slate-800 cursor-text dark:text-slate-400">
                    <a href="">{{ $title }}</a>
                </li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->

        <!-- BEGIN: Notifications -->
        {{-- <livewire:system.notification.notification-list-component /> --}}
        <!-- END: Notifications  -->
        <!-- BEGIN: Account Menu -->
        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-toggle="dropdown"
                aria-expanded="false"
                class="cursor-pointer image-fit zoom-in intro-x block h-8 w-8 overflow-hidden rounded-full shadow-lg"><img
                    src="{{ asset('dist/images/fakers/profile-14.jpg') }}"
                    alt="Midone - Tailwind Admin Dashboard Template">
            </button>
            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
                data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                data-leave="transition-all ease-linear duration-150"
                data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                class="dropdown-menu absolute z-[9999] hidden">
                <div data-tw-merge=""
                    class="dropdown-content rounded-md border-transparent p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 mt-px w-56 bg-theme-1 text-white">
                    <div class="p-2 font-medium ">
                        <div class="font-medium">{{ Auth::user()->full_name }}</div>
                        <p class="text-xs">{{ Auth::user()->department->name }}</p>
                        {{-- <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                            Software Engineer
                        </div> --}}
                    </div>
                    <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400 ">
                    </div>
                    <a
                        class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md  
                        dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                            data-tw-merge="" data-lucide="user" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Profile
                    </a>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();
                            document.cookie = 'data_privacy_accepted=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'"
                        class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md  dark:bg-darkmode-600 
                        dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                            data-tw-merge="" data-lucide="toggle-right" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
    <!-- END: Top Bar -->


</section>
