<section>
    <div x-data="{ sideModal: $wire.sideModal, sideDepartmentModal: $wire.sideDepartmentModal }">
        <x-topbar title="User Profile" />
        <div class="intro-y box mt-5 px-5 pt-5">
            <div class="-mx-5 flex flex-col border-b border-slate-200/60 pb-5 dark:border-darkmode-400 lg:flex-row">
                <div class="flex flex-1 items-center justify-center px-5 lg:justify-start">
                    <div class="image-fit relative h-20 w-20 flex-none sm:h-24 sm:w-24 lg:h-32 lg:w-32">
                        <img class="rounded-full" src="{{ asset('images/profile.png') }}"
                            alt="Midone - Tailwind Admin Dashboard Template">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 truncate text-2xl font-medium sm:w-40 sm:whitespace-normal">
                            {{ $user->full_name }}
                        </div>
                        @if (optional($user->department)->name)
                            <div class="text-slate-500 italic font-bold">{{ optional($user->department)->name }}</div>
                        @else
                            <div class="text-red-500 italic font-bold"><i><-- No Department --></i></div>
                        @endif
                        @if (optional($user->position)->name)
                            <div class=" text-slate-500 italic">{{ optional($user->position)->name }}</div>
                        @else
                            <div class="text-red-500 italic"><i><-- No Position --></i></div>
                        @endif
                    </div>
                </div>
                <div
                    class="mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-t-0 lg:pt-0">
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
                <div
                    class="mt-6 flex flex-1 items-center justify-center border-t border-slate-200/60 px-5 pt-5 dark:border-darkmode-400 lg:mt-0 lg:border-0 lg:pt-0">
                    <div class="w-20 rounded-md py-3 text-center">
                        <div class="text-xl font-medium text-primary">0</div>
                        <div class="text-slate-500">Request</div>
                    </div>
                </div>
            </div>
            <ul data-tw-merge="" role="tablist"
                class="w-full flex flex-col justify-center text-center sm:flex-row lg:justify-start">
                <li id="profile-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <button data-tw-merge="" data-tw-target="#profile" role="tab"
                        class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary active flex items-center py-4"><i
                            data-tw-merge="" data-lucide="user" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Profile</button>
                </li>
                <li id="view-history-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <button data-tw-merge="" data-tw-target="#view-history" role="tab"
                        class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i
                            data-tw-merge="" data-lucide="shield" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        View history</button>
                </li>
                <li id="change-password-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <a data-tw-merge="" data-tw-target="#change-password" role="tab"
                        class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i
                            data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Change Password</a>
                </li>
                <li id="manage-roles-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none">
                    <a data-tw-merge="" data-tw-target="#assign-roles" role="tab"
                        class="cursor-pointer appearance-none px-5 border border-transparent text-slate-700 dark:text-slate-400 [&.active]:text-slate-800 [&.active]:dark:text-white border-b-2 dark:border-transparent [&.active]:border-b-primary [&.active]:font-medium [&.active]:dark:border-b-primary flex items-center py-4"><i
                            data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                        Manage Roles</a>
                </li>
            </ul>
        </div>

        <div class="tab-content mt-5">

            <div data-transition="" data-selector=".active"
                data-enter="transition-[visibility,opacity] ease-linear duration-150"
                data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100"
                data-leave="transition-[visibility,opacity] ease-linear duration-150"
                data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0"
                id="profile" role="tabpanel" aria-labelledby="profile-tab"
                class="tab-pane active grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 gap-4 ">
                <div
                    class="intro-y box mt-3 rounded-md p-5 col-span-1 md:col-start-1  md:col-span-6 lg:col-start-1 lg:col-span-6">
                    <div class="mb-5 flex items-center border-b border-slate-200/60 pb-5 dark:border-darkmode-400">
                        <div class="truncate text-base font-medium">
                            Profile
                        </div>
                        <button x-on:click="sideModal = !sideModal" class="ml-auto flex items-center text-primary"
                            href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" data-lucide="edit"
                                class="lucide lucide-edit stroke-1.5 mr-2 h-4 w-4">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"></path>
                            </svg>
                            Edit Details
                        </button>
                    </div>
                    <div class="flex items-center">
                        First name: {{ $user->firstname }}
                    </div>
                    <div class="mt-3 flex items-center">
                        Middle name: {{ $user->middlename }}
                    </div>
                    <div class="mt-3 flex items-center">
                        Last name: {{ $user->lastname }}
                    </div>
                    <div class="mt-3 flex items-center">
                        Suffix: {{ $user->suffix }}
                    </div>
                    <div class="mt-3 flex items-center">
                        Email Address: {{ $user->email }}
                    </div>
                </div>
                <div
                    class="intro-y box mt-3 rounded-md p-5 col-span-1 md:col-start-7 md:col-span-6 lg:col-start-7  lg:col-span-6">
                    <div class=" mb-5 flex items-center border-b border-slate-200/60 pb-5 dark:border-darkmode-400">
                        <div class="truncate text-base font-medium">
                            Department
                        </div>
                        <button x-on:click="sideDepartmentModal = !sideDepartmentModal"
                            class="ml-auto flex items-center text-primary" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" data-lucide="edit"
                                class="lucide lucide-edit stroke-1.5 mr-2 h-4 w-4">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"></path>
                            </svg>
                            Edit Details
                        </button>
                    </div>
                    @if (optional($user->department)->name)
                        <div class="flex items-center">
                            Department: {{ $user->department->name }}
                        </div>
                    @else
                        <div class="flex items-center">
                            Department: <i>N/A</i>
                        </div>
                    @endif
                    @if (optional($user->position)->name)
                        <div class="mt-3 flex items-center">
                            Position name: {{ $user->position->name }}
                        </div>
                    @else
                        <div class="mt-3 flex items-center">
                            Position name: <i><-- n/a --></i>
                        </div>
                    @endif
                </div>
            </div>

            <x-tab-container title="View History" id="view-history">
                View History Here
            </x-tab-container>

            <x-tab-container title="Manage Roles" id="assign-roles">

                <div class="flex flex-row gap-4">

                </div>

            </x-tab-container>

        </div>

        <div x-show="sideModal" x-cloak>
            <x-side-modal title="User Details">
                <!-- Modal body -->
                <form wire:submit.prevent="SaveDetail">
                    <div class="text-left my-2">
                        <div class="w-full mt-10">
                            <label data-tw-merge for="firstname"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                First name
                            </label>
                            <input data-tw-merge id="firstname" type="text" placeholder="Insert first name"
                                required wire:model.defer="firstname"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" />
                        </div>
                        <div class="w-full mt-3">
                            <label data-tw-merge for="middlename"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                Middle name
                            </label>
                            <input data-tw-merge id="middlename" type="text" placeholder="Insert middle name"
                                wire:model.defer="middlename"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" />
                        </div>
                        <div class="w-full mt-3">
                            <label data-tw-merge for="lastname"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                Last name
                            </label>
                            <input data-tw-merge id="lastname" type="text" placeholder="Insert last name"
                                wire:model.defer="lastname"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" />
                        </div>
                        <div class="w-full mt-3">
                            <label data-tw-merge for="suffix"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                Suffix
                            </label>
                            <input data-tw-merge id="suffix" type="text" placeholder="Insert suffix name"
                                required wire:model.defer="suffix"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" />
                        </div>
                        <div class="w-full mt-3">
                            <label data-tw-merge for="email"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                Email Address
                            </label>
                            <input data-tw-merge id="email" type="text"
                                placeholder="Insert email address name" required wire:model.defer="email"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" />
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center justify-end gap-2 mt-10">
                        <button type="button" x-on:click="sideModal = false"
                            class="w-full inline-flex justify-center rounded-md border border-blue-500 px-4 py-2 text-base font-medium text-blue-500 hover:text-white hover:border-blue-400 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
                            Close
                        </button>
                        <button type="submit" x-on:click="sideModal = false, sideDepartmentModal = false"
                            class="w-full inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm"
                            @click="open = false">
                            Save
                        </button>
                    </div>
                </form>
            </x-side-modal>
        </div>

        <div x-show="sideDepartmentModal" x-cloak>
            <x-side-modal title="Department details">
                <!-- Modal body -->
                <form wire:submit.prevent="SaveDepartmentDetail">
                    <div class="text-left my-2">
                        <div class="w-full mt-10">
                            <label data-tw-merge for="firstname"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                Department
                            </label>
                            <select wire:model.defer="department" data-tw-merge aria-label="Default select example"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 sm:mr-2 mt-2 sm:mr-2">
                                <option selected>N/A</option>
                                @foreach ($departmentData as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full mt-3">
                            <label data-tw-merge for="email"
                                class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                Position
                            </label>
                            <select wire:model.defer="position" data-tw-merge aria-label="Default select example"
                                class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 sm:mr-2 mt-2 sm:mr-2">
                                <option selected>N/A</option>
                                @foreach ($positionData as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center justify-end gap-2 mt-10">
                        <button type="button" x-on:click="sideDepartmentModal = false"
                            class="w-full inline-flex justify-center rounded-md border border-blue-500 px-4 py-2 text-base font-medium text-blue-500 hover:text-white hover:border-blue-400 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
                            Close
                        </button>
                        <button x-on:click="sideModal = false, sideDepartmentModal = false" type="submit"
                            class="w-full inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm"
                            @click="open = false">
                            Save
                        </button>
                    </div>
                </form>
            </x-side-modal>
        </div>
    </div>




</section>
