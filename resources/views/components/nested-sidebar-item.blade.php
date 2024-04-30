@props(['label'])
<li>
    <a href="javascript:;" class="side-menu">
        <div class="side-menu__icon">
            <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
        </div>
        <div class="side-menu__title">
            {{ $label }}
            <div class="side-menu__sub-icon ">
                <i data-tw-merge="" data-lucide="chevron-down" class="stroke-1.5 w-5 h-5"></i>
            </div>
        </div>
    </a>
    <ul class="">
        {{ $slot }}
    </ul>
</li>
