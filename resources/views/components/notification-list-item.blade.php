@props(['title','description','timeStamp'])
<div class="cursor-pointer relative flex items-center
bg-slate-100 hover:bg-slate-400 py-2 rounded-xl">
    
    <a class="ml-2 overflow-hidden  hover:text-stone-900" {{ $attributes }}>
        <div class="flex items-center">
            <label class="mr-5 truncate font-medium" >
                {{ $title }}
            </label>
            <div class="ml-auto whitespace-nowrap text-xs text-slate-400 hover:text-stone-800">
                {{ $timeStamp }}
            </div>
        </div>
        <div class="mt-0.5 w-full truncate text-slate-500 hover:text-stone-800">
            {{ $description }}
        </div>
    </a>

</div>
