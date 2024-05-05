@props(['submit'])

<div class="preview-component intro-y box">
    <div class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>
    <div class="p-5">
        <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
            <form wire:submit.prevent="{{ $submit }}">
                @csrf
                <div
                    class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                    <div class="flex flex-col gap-6">
                        {{ $form }}
                    </div>
                </div>

                @if (isset($actions))
                    <div
                        class="flex items-center justify-end gap-4 px-4 py-3 bg-gray-50 text-end sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        {{ $actions }}
                    </div>
                @endif

                <div
                    class="flex items-center justify-center gap-4 px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $slot }}
                </div>
               
            </form>

        </div>
    </div>
</div>
