@props(['title'])
<section>
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ $title }}</h2>
    </div>
    <div class="intro-y mt-5 grid grid-cols-1 md:grid-cols-9 lg:grid-col-12 gap-4">
        {{ $slot }}
    </div>

</section>