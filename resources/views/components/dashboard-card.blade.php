@props(['count', 'title'])
<div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
    <div
        class="relative zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
        <div class="box p-5">
            <div class="flex">
                <div class="ml-auto">
                    <div data-placement="top"
                        class="tooltip cursor-pointer flex items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs 
                        font-medium text-white">

                    </div>
                </div>
            </div>
            <div class="mt-6 text-3xl font-medium leading-8">{{ $count }}</div>
            <div class="mt-1 text-base text-slate-500">{{ $title }}</div>
        </div>
    </div>
</div>
