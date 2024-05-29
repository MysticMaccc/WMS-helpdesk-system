@props(['title'])
<div class="preview-component intro-y box">
    <div class="flex flex-col items-center border-b border-slate-200/60 p-5 dark:border-darkmode-400 sm:flex-row">
        {{ $title }}
    </div>
    <div class="p-5">
        <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
            {{ $slot }}
        </div>
    </div>
</div>
