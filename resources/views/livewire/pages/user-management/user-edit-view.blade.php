<div>
    <x-topbar title="User Profile" />
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box mt-5 px-5 pt-5">
        <div class="-mx-5 flex flex-col border-b border-slate-200/60 pb-5 dark:border-darkmode-400 lg:flex-row">
            <div class="flex flex-1 items-center justify-center px-5 lg:justify-start">
                <div class="image-fit relative h-20 w-20 flex-none sm:h-24 sm:w-24 lg:h-32 lg:w-32">
                    <img class="rounded-full" src="{{asset('images/profile.png')}}" alt="Midone - Tailwind Admin Dashboard Template">
                </div>
                <div class="ml-5">
                    <div class="w-24 truncate text-lg font-medium sm:w-40 sm:whitespace-normal">
                        {{$user->full_name}}
                    </div>
                    @if(optional($user->department)->name)
                    <div class="text-slate-500">{{optional($user->department)->name}}</div>
                    @else
                    <div class="text-red-500"><i><-- No Position --></i></div>
                    @endif
                    @if(optional($user->position)->name)
                    <div class="text-slate-500">{{optional($user->position)->name}}</div>
                    @else
                    <div class="text-red-500"><i><-- No Position --></i></div>
                    @endif
                </div>
            </div>
            <div class="mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-t-0 lg:pt-0">
                <div class="text-center font-medium lg:mt-3 lg:text-left">
                    Contact Details
                </div>
                <div class="mt-4 flex flex-col items-center justify-center lg:items-start">
                    <div class="flex items-center truncate sm:whitespace-normal">
                        <i data-tw-merge="" data-lucide="mail" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        {{ $user->email }}
                    </div>
                </div>
            </div>
            <div class="mt-6 flex flex-1 items-center justify-center border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-0 lg:pt-0">
                <div class="w-20 rounded-md py-3 text-center">
                    <div class="text-xl font-medium text-primary">0</div>
                    <div class="text-slate-500">Request</div>
                </div>
            </div>
        </div>
        <ul data-tw-merge="" role="tablist" class="w-full flex flex-col justify-center text-center sm:flex-row lg:justify-start">
            <li id="profile-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                <button data-tw-merge="" data-tw-target="#profile" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary active flex items-center py-4"><i data-tw-merge="" data-lucide="user" class="stroke-1.5 mr-2 h-4 w-4"></i>
                    Profile</button>
            </li>
            <li id="account-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                <button data-tw-merge="" data-tw-target="#account" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i data-tw-merge="" data-lucide="shield" class="stroke-1.5 mr-2 h-4 w-4"></i>
                    Account</button>
            </li>
            <li id="change-password-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                <a data-tw-merge="" data-tw-target="#change-password" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                    Change Password</a>
            </li>
            <li id="settings-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                <a data-tw-merge="" data-tw-target="#settings" role="tab" class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i data-tw-merge="" data-lucide="settings" class="stroke-1.5 mr-2 h-4 w-4"></i>
                    Settings</a>
            </li>
        </ul>
    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane active">
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">
                        Profile
                    </h2>
                </div>
                <div class="p-5">
                    <div class="tab-content">
                        <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="work-in-progress-new" role="tabpanel" aria-labelledby="work-in-progress-new-tab" class="tab-pane active">
                            <!-- insert here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="account" role="tabpanel" aria-labelledby="account-tab" class="tab-pane ">
            <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">
                        Account
                    </h2>
                </div>
                <div class="p-5">
                    <div class="tab-content">
                        <div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150" data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100" data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="work-in-progress-new" role="tabpanel" aria-labelledby="work-in-progress-new-tab" class="tab-pane active">
                            <!-- insert here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>