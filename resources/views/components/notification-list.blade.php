@props(['count' => 0])
<div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative intro-x mr-auto sm:mr-6">


    <div data-tw-toggle="dropdown" aria-expanded="false"
        class="cursor-pointer relative block text-slate-600 outline-none 
        {{ 
        $count > 0 ?
        " before:absolute before:right-0 before:top-[-2px] before:h-[8px] before:w-[8px] 
        before:rounded-full before:bg-danger before:content-[''] animate-pulse " : ""
        }}  " 
        >
        <i data-tw-merge="" data-lucide="bell" class="stroke-1.5 w-5 h-5 dark:text-slate-500"></i>
    </div>


    <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
        data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
        data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150"
        data-leave-from="!mt-1 visible opacity-100 translate-y-0"
        data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">

        <div data-tw-merge=""
            class="dropdown-content rounded-md border-transparent bg-white shadow-[0px_3px_10px_#00000017] dark:border-transparent 
            dark:bg-darkmode-600 mt-2 w-[280px] p-5 sm:w-[350px]">
            <div class="mb-5 font-medium">Notifications</div>

            {{ $slot }}

        </div>

    </div>


</div>
