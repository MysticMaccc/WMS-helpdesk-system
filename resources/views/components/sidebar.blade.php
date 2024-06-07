<nav class="side-nav hidden w-[80px] overflow-x-hidden pb-16 pr-5 md:block xl:w-[230px]">
    @php
    $activeRoute = Route::currentRouteName();
    @endphp

    <a class="flex items-center pt-4 pl-5 intro-x" href="">
        <img class="w-6" src="{{ asset('dist/images/logo.svg') }}" alt="Midone - Tailwind Admin Dashboard Template">
        <span class="hidden ml-3 text-lg text-white xl:block"> IDP </span>
    </a>
    <div class="my-6 side-nav__divider"></div>
    <ul>

        <x-nested-sidebar-item label="Dashboard" :status="in_array($activeRoute, ['dashboard'])">
            <x-sidebar-link-item label="Home" route="dashboard" />
        </x-nested-sidebar-item>

        <x-sidebar-link-item label=" Request List" :status="in_array($activeRoute, ['request.index'])"
            route="request.index" />

        <x-nested-sidebar-item label="Request Maintenance"
            :status="in_array($activeRoute, ['category.index', 'request-type.index', 'request-type-status.index'])">
            <x-sidebar-link-item label="Category" route="category.index" />
            <x-sidebar-link-item label="Request Type" route="request-type.index" />
            <x-sidebar-link-item label="Request Type Status" route="request-type-status.index" />
        </x-nested-sidebar-item>

        <x-nested-sidebar-item label="Maintenance">
            <x-sidebar-link-item label="Position Maintenance" route="position.index"
                :status="in_array($activeRoute, ['position.index'])" />
            <x-sidebar-link-item label="User Roles" route="user-role.index"
                :status="in_array($activeRoute, ['user-role.index'])" />

            <x-sidebar-link-item label="Department" route="department.index"
                :status="in_array($activeRoute, ['department.index'])" />

            <x-sidebar-link-item label="User Management" route="user-management.index"
                :status="in_array($activeRoute, ['user-management.index'])" />
        </x-nested-sidebar-item>


    </ul>
</nav>