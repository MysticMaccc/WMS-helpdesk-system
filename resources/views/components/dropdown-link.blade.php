@props(['title'])

<a {{ $attributes }}
    class="cursor-pointer flex items-center p-2 text-stone-600 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 
        dark:hover:bg-darkmode-400 dropdown-item"
    wire:navigate>
    <i data-tw-merge="" data-lucide="printer" class="stroke-1.5 mr-2 h-4 w-4"></i>
    {{ $title }}
</a>
