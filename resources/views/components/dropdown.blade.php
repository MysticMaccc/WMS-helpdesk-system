<div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge=""
    data-tw-toggle="dropdown" aria-expanded="false"
    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed !box px-2"><span
        class="flex h-5 w-5 items-center justify-center">
        <i data-tw-merge="" data-lucide="plus" class="stroke-1.5 h-4 w-4"></i>
    </span></button>
<div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150"
    data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
    data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150"
    data-leave-from="!mt-1 visible opacity-100 translate-y-0"
    data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
    <div data-tw-merge=""
        class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
        {{ $slot }}
    </div>
</div>
</div>