@props(['wireModel', 'label', 'data', 'disabled' => false])
<div class="w-full">
    <label data-tw-merge="" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
        {{ $label }}
    </label>
    <select data-tw-merge="" aria-label="Default select example" {{ $attributes->merge([
            'class' => "disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50  rounded-full
                        [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 
                        ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 
                        focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 
                        group-[.form-inline]:flex-1 mt-2 sm:mr-2",
        ]) }}>
        <option>Select</option>
        @foreach ($data as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error($wireModel)
    <p class="text-sm text-red-800">{{ $message }}</p>
    @enderror
</div>