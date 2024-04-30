@props(['title'])
<a data-tw-merge=""
    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 
    rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 
    dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 
    disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary mr-2 shadow-md"
     {{ $attributes }}>
    {{ $title }}
</a>
