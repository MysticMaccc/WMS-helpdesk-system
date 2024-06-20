@props(['label', 'route', 'status' => 'null', 'icon' => 'hard-drive'])
<li>
    <a href="{{ route($route) }}" class="hover:bg-sky-800 side-menu {{ $status ? 'side-menu--active' : '' }}"
        wire:navigate>
        <div class="side-menu__icon">
            <i data-tw-merge="" data-lucide="{{ $icon }}" class="stroke-1.5 w-5 h-5"></i>
        </div>
        <div class="side-menu__title text-stone-100">
            {{ $label }}
        </div>
    </a>
</li>
