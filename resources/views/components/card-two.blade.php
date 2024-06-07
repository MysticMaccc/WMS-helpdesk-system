@props(['title', 'name'])
<div class="flex flex-col intro-y">
    <div class="bg-blue-900 w-full h-10 text-white rounded-t-lg mt-4 flex items-center justify-start pl-2 font-bold">
        {{$title}}
    </div>
    <div class="bg-slate-200 w-full h-max text-white">
        {{$slot}}
    </div>
    <div class="bg-slate-300 w-full h-max text-white rounded-b-lg border-t border-slate-300">
        {{$footer}}
    </div>
</div>