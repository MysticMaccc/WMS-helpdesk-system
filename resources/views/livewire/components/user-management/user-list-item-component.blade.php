<div class="intro-y col-span-12 md:col-span-6">
    <div class="box">
        <div class="flex flex-col items-center p-5 lg:flex-row">
            <div class="image-fit h-24 w-24 lg:mr-1 lg:h-12 lg:w-12">
                <img class="rounded-full" src="{{asset('images/profile.png')}}" alt="Midone - Tailwind Admin Dashboard Template">
            </div>
            <div class="mt-3 text-center lg:ml-2 lg:mr-auto lg:mt-0 lg:text-left">
                <a class="font-medium" href="">
                    {{ $data->full_name }}
                </a>
                <div class="mt-0.5 text-xs text-slate-500">
                    {{ $data->email}}
                </div>
                @if(optional($data->department)->name)
                <div class="mt-0.5 text-xs text-slate-500">
                    {{ optional($data->department)->name}}
                </div>
                @else
                <div class="mt-0.5 text-xs text-red-500">
                    <-- No Department -->
                </div>
                @endif
            </div>
            <div class="mt-4 flex lg:mt-0">
                <a href="{{route('user-management.edit', ['hash' => $data->hash])}}" class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 px-2 py-1">Profile</a>
            </div>
        </div>
    </div>
</div>