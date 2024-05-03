<section>

        <div x-data="{modal: {{ $showModal }}}"
            class="p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600 before:hidden before:xl:block before:content-[''] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400 after:hidden after:xl:block after:content-[''] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700">
            <div class="container relative z-10 sm:px-10">
                <div class="block grid-cols-2 gap-4 xl:grid">
                    <!-- BEGIN: Login Info -->
                    <div class="hidden min-h-screen flex-col xl:flex">
                        <a class="-intro-x flex items-center pt-5" href="">
                            <img class="w-6" src="{{ asset('dist/images/logo.svg') }}"
                                alt="Midone - Tailwind Admin Dashboard Template">
                            <span class="ml-3 text-lg text-white"> Help - Desk </span>
                        </a>
                        <div class="my-auto">
                            <img class="-intro-x -mt-16 w-1/2" src="{{ asset('dist/images/illustration.svg') }}"
                                alt="Midone - Tailwind Admin Dashboard Template">
                            <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                                A few more clicks to <br>
                                sign in to your account.
                            </div>
                            <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                                Manage all your e-commerce accounts in one place
                            </div>
                        </div>
                    </div>
                    <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                        <div
                            class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                            <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                                Sign In
                            </h2>
                            <br>
                            <x-slot name="logo">
                                <x-authentication-card-logo />
                            </x-slot>

                            <div class="intro-x text-slate-400 text-danger">
                                A few more clicks to sign in to your account. Manage all your
                                e-commerce accounts in one place
                            </div>
                            {{-- <form method="POST" action="{{ route('login') }}"> --}}
                                <form wire:submit.prevent="logInAuthenticate">
                                    @csrf
                                    <div class="intro-x mt-8">
                                        <x-input data-tw-merge="" label="Email" wireModel="email" id="email" placeholder="Email" type="email"
                                            name="email" wire:model="email" required autofocus
                                            autocomplete="username" />
                                        <x-input data-tw-merge="" label="Password" wireModel="password" placeholder="Password" id="password" type="password"
                                            name="password" required wire:model="password"
                                            autocomplete="current-password" />
                                    </div>
                                    <div
                                        class="intro-x mt-4 flex text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                        <div class="mr-auto flex items-center">
                                            <input data-tw-merge="" type="checkbox"
                                                class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50 mr-2 border"
                                                id="remember-me">
                                            <label class="cursor-pointer select-none" for="remember-me">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="">Forgot Password?</a>
                                    </div>
                                    <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                        <x-button data-tw-merge="">
                                            {{ __('Log in') }}
                                        </x-button>
                                        <a data-tw-merge="" href="{{ route('register') }}"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32">Register</a>
                                    </div>
                                </form>

                                <div x-show="modal">
                                    <x-modal />
                                </div>

                                <div
                                    class="intro-x mt-10 text-center text-slate-600 dark:text-slate-500 xl:mt-24 xl:text-left">
                                    By signin up, you agree to our
                                    <a class="text-primary dark:text-slate-200" href="">
                                        Terms and Conditions
                                    </a>
                                    &
                                    <a class="text-primary dark:text-slate-200" href="">
                                        Privacy Policy
                                    </a>
                                </div>
                        </div>
                    </div>
                    <!-- END: Login Form -->
                </div>
            </div>
        </div>

</section>