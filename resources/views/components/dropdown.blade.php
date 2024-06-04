<div class="relative" x-data="{ open: false }">
    <button @click="open = !open"
        class="border shadow-sm inline-flex items-center justify-center py-2 rounded-md 
    font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none 
    dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 
    [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed !box px-2">
        <span class="flex h-5 w-5 items-center justify-center">
            <i data-tw-merge="" data-lucide="plus" class="stroke-1.5 h-4 w-4"></i>
        </span>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95" @click.outside="open = false"
        class="absolute mt-2 bg-white rounded shadow-lg z-[9999]">
        {{ $slot }}
    </div>
</div>
