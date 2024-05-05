@if (session()->has('success'))
    <div role="alert"
        class="alert relative border rounded-md px-5 py-4 bg-success border-success text-slate-900 dark:border-success mb-2 flex items-center">
        <i data-tw-merge="" data-lucide="alert-triangle" class="stroke-1.5 mr-2 h-6 w-6"></i>
        {{ session('success') }}
        <button data-tw-merge="" data-tw-dismiss="alert" type="button" aria-label="Close" {{ $attributes }}
            class="text-slate-800 py-2 px-3 absolute right-0 my-auto mr-2 btn-close"><i data-tw-merge="" data-lucide="x"
                class="stroke-1.5 h-4 w-4"></i></button>
    </div>
@elseif (session()->has('error'))
    <div role="alert"
        class="alert relative border rounded-md px-5 py-4 bg-warning border-warning text-slate-900 dark:border-warning mb-2 flex items-center">
        <i data-tw-merge="" data-lucide="alert-circle" class="stroke-1.5 mr-2 h-6 w-6"></i>
        {{ session('error') }}
        <button data-tw-merge="" data-tw-dismiss="alert" type="button" aria-label="Close" {{ $attributes }}
            class="text-slate-800 py-2 px-3 absolute right-0 my-auto mr-2 btn-close"><i data-tw-merge="" data-lucide="x"
                class="stroke-1.5 h-4 w-4"></i></button>
    </div>
@endif
