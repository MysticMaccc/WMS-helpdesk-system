<div>
    <h2 class="intro-y mt-10 text-lg font-medium">{{ $title }}</h2>
    <div class="mt-5 grid grid-cols-12 gap-6">
        <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
            <button data-tw-merge data-tw-toggle="modal" data-tw-target="#large-modal-size-preview" data-tw-merge=""
                class="
                transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300
                 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md">Add
                New Position</button>
            <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative">
                <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
                    data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                    data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                    data-leave="transition-all ease-linear duration-150"
                    data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                    data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                    class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge=""
                        class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                        <a
                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                data-tw-merge="" data-lucide="printer" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Print</a>
                        <a
                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                data-tw-merge="" data-lucide="file-text" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Export to
                            Excel</a>
                        <a
                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                data-tw-merge="" data-lucide="file-text" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Export to
                            PDF</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto hidden text-slate-500 md:block ">
                Total of {{ $positions->count() }} entries
            </div>
            <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                <div class="relative w-56 text-slate-500">
                    <input data-tw-merge="" type="text" placeholder="Search..."
                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 !box w-56 pr-10">
                    <i data-tw-merge="" data-lucide="search"
                        class="stroke-1.5 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"></i>
                </div>
            </div>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
                <x-position-table-header />
                <tbody>
                    @foreach ($positions as $index => $item)
                    <tr data-tw-merge="" class="intro-x">
                        <td data-tw-merge=""
                            class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                            <div class="flex">
                                {{ $index + 1 }}
                            </div>
                        </td>
                        <td data-tw-merge=""
                            class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                            <a class="whitespace-nowrap font-medium" href="">
                                {{ $item->name }}
                            </a>
                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                Modified By: {{ $item->modified_by }}
                            </div>
                        </td>
                        <td data-tw-merge=""
                            class="px-5 py-3 border-b dark:border-darkmode-300 box w-56 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600 before:absolute before:inset-y-0 before:left-0 before:my-auto before:block before:h-8 before:w-px before:bg-slate-200 before:dark:bg-darkmode-400">
                            <div class="flex items-center justify-center">
                                <a class="mr-3 flex items-center" href="#">
                                    <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                    Edit
                                </a>
                                <a class="flex items-center text-danger" wire:click="deletePosition({{$item->id}})"
                                    href="#">
                                    <i data-tw-merge="" data-lucide="trash" class="stroke-1.5 mr-1 h-4 w-4"></i>
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    <!-- BEGIN: Super Large Modal Content -->
    <!-- END: Super Large Modal Content -->
    <div class="text-center">
        <!-- BEGIN: Notification Content -->
        <div id="basic-non-sticky-notification-content" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex flex flex-col sm:flex-row flex flex-col sm:flex-row">
            <div class="font-medium">
                Yay! Updates Published!
            </div>
            <a class="mt-1 font-medium text-primary dark:text-slate-400 sm:ml-40 sm:mt-0" href="">
                Review Changes
            </a>
        </div>
        <!-- END: Notification Content -->
        <!-- BEGIN: Notification Toggle -->
        <button data-tw-merge id="basic-non-sticky-notification-toggle" class="intro-y transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-1 mr-1">Show Non Sticky Notification</button>
        <!-- END: Notification Toggle -->
    </div>
    <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="large-modal-size-preview" class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
        <div data-tw-merge class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600    sm:w-[600px] lg:w-[900px] p-10 text-center">
            <div class="modal-content">
                <div class="modal-header border-b-2">
                    <h2 class="font-medium text-lg">Add New Position</h2>
                </div>
            <div class="mt-2">
                <input type="text" wire:model="newposition" class="w-full rounded-lg text-center" placeholder="Enter new position">
            </div>
            <div>
                <button wire:click="ForAddPosition" class="w-full mt-2 h-9 bg-indigo-950 text-white rounded-lg">Add</button>
            </div>
        </div>
    </div>
</div>