@props(['title', 'body', 'actions'])
<dialog tabindex="-1" aria-hidden="true" {{ $attributes }}
    class="bg-sky-600 w-96  rounded-xl z-50 shadow-lg 
            overflow-y-auto overflow-x-auto fixed top-0 right-0 bottom-0 left-0"
    x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100" 
    x-transition:leave="motion-safe:ease-out duration-300"
    open>
    <div class="flex flex-col">
        <div class="w-full border-b-2 border-stone-200 py-4">
            <h1 class="font-semibold text-stone-200 ml-4 text-xl">{{ $title }}</h1>
        </div>
        <div class="w-full border-b-2 border-stone-200 py-4 px-4">
            {{ $body }}
        </div>
        <div class="w-full border-b-2 border-stone-200 py-4 px-4
             flex flex-row justify-end gap-4">
            {{ $actions }}
        </div>
    </div>
</dialog>
