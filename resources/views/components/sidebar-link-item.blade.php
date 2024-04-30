@props(['label','route'])
<li>
    <a href="{{ route($route) }}" class="side-menu">
        <div class="side-menu__icon">
            <i data-tw-merge="" data-lucide="hard-drive" class="stroke-1.5 w-5 h-5"></i>
        </div>
        <div class="side-menu__title text-stone-300">
            {{ $label }}
        </div>
    </a>
</li>
