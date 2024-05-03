<nav class="side-nav hidden w-[80px] overflow-x-hidden pb-16 pr-5 md:block xl:w-[230px]">
    <a class="flex items-center pt-4 pl-5 intro-x" href="">
        <img class="w-6" src="{{ asset('dist/images/logo.svg') }}" alt="Midone - Tailwind Admin Dashboard Template">
        <span class="hidden ml-3 text-lg text-white xl:block"> Rubick </span>
    </a>
    <div class="my-6 side-nav__divider"></div>
    <ul>

        <x-nested-sidebar-item label="Dashboard">
            <x-sidebar-link-item label="Page 1" route="dashboard" />
            <x-sidebar-link-item label="Page 2" route="dashboard" />
            <x-sidebar-link-item label="Page 3" route="dashboard" />
        </x-nested-sidebar-item>

        <x-nested-sidebar-item label="Request Form" >
            <x-sidebar-link-item label="Page 4" route="dashboard" />
            <x-sidebar-link-item label="Page 5" route="dashboard" />
            <x-sidebar-link-item label="Page 6" route="dashboard" />
        </x-nested-sidebar-item>

        <x-nested-sidebar-item label="Request Maintenance" >
            <x-sidebar-link-item label="Request Type" route="request-type.index" />
        </x-nested-sidebar-item>

        <x-sidebar-link-item label="User Roles" route="user-role.index" />

    </ul>
</nav>
