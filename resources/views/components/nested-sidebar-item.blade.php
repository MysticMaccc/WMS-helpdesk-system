@props(['label', 'status' => 'null'])
<li x-data="{ open: false }">
    <a class="hover:bg-sky-800 side-menu {{ $status ? 'side-menu--active' : '' }} @click=" open=!open">
        <div class="side-menu__icon">
            {{ $icon }}
        </div>
        <div class="side-menu__title text-stone-100">
            {{ $label }}
            <div class="side-menu__sub-icon">
                <i :class="{ 'rotate-180': open }" data-tw-merge="" data-lucide="chevron-down"
                    class="stroke-1.5 w-5 h-5 transition-transform"></i>
            </div>
        </div>
    </a>
    <ul x-show="open" x-cloak>
        {{ $slot }}
    </ul>
</li>
