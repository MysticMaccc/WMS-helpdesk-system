<nav class="side-nav hidden w-[80px] overflow-x-hidden pb-16 pr-5 md:block xl:w-[230px]">
    @php
        $activeRoute = Route::currentRouteName();
    @endphp

    <a class="flex items-center pt-4 pl-5 intro-x" href="">
        <img class="w-20" src="{{ asset('storage/system/DPI.png') }}" alt="Midone - Tailwind Admin Dashboard Template">
        <span class="hidden ml-3 text-xl font-bold text-stone-200 xl:block"> Help Desk System </span>
    </a>
    <div class="my-6 side-nav__divider"></div>
    <ul>

        {{-- <x-nested-sidebar-item label="Dashboard" :status="in_array($activeRoute, ['dashboard'])">
            <x-slot:icon>
                <i data-tw-merge="" data-lucide="home" class="stroke-1.5 w-5 h-5"></i>
            </x-slot:icon>
            <x-sidebar-link-item label="Home" route="dashboard" />
        </x-nested-sidebar-item> --}}

        <x-sidebar-link-item icon="home" label="Dashboard" route="dashboard.index" />
        <x-sidebar-link-item icon="edit3" label="Request List" :status="in_array($activeRoute, ['request.index'])" route="request.index" />

        <x-nested-sidebar-item label="Request Maintenance" :status="in_array($activeRoute, ['category.index', 'request-type.index', 'request-type-status.index'])">
            <x-slot:icon>
                <i data-tw-merge="" data-lucide="message-circle" class="stroke-1.5 w-5 h-5"></i>
            </x-slot:icon>
            <x-sidebar-link-item icon="menu" label="Category" route="category.index" />
            <x-sidebar-link-item icon="file-text" label="Request Type" route="request-type.index" />
            <x-sidebar-link-item icon="file-plus" label="Request Type Status" route="request-type-status.index" />
        </x-nested-sidebar-item>

        <x-nested-sidebar-item label="Maintenance" :status="in_array($activeRoute, [
            'position.index',
            'user-role.index',
            'department.index',
            'user-management.index',
            'user-type.index',
        ])">
            <x-slot:icon>
                <i data-tw-merge="" data-lucide="settings" class="stroke-1.5 w-5 h-5"></i>
            </x-slot:icon>
            <x-sidebar-link-item icon="sliders" label="Position Maintenance" route="position.index" :status="in_array($activeRoute, ['position.index'])" />
            <x-sidebar-link-item icon="sliders" label="User Roles" route="user-role.index" :status="in_array($activeRoute, ['user-role.index'])" />

            <x-sidebar-link-item icon="sliders" label="Department" route="department.index" :status="in_array($activeRoute, ['department.index'])" />

            <x-sidebar-link-item icon="sliders" label="User Management" route="user-management.index"
                :status="in_array($activeRoute, ['user-management.index'])" />

            {{-- <x-sidebar-link-item icon="sliders" label="User Type Management" route="user-type.index"
                :status="in_array($activeRoute, ['user-type.index'])" /> --}}

        </x-nested-sidebar-item>
    </ul>
</nav>
