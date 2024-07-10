<section>

    <x-topbar title="Dashboard" />

    <div
        class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">

        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 2xl:col-span-9">

                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium">General Report</h2>
                        </div>
                        <div class="mt-5 grid grid-cols-12 gap-6">

                            <x-dashboard-card count="{{ count($aprroveRequestData) }}"
                                title="Approve Submitted Request" />
                            <x-dashboard-card count="{{ count($assignRequestData) }}" title="Assign Request" />
                            <x-dashboard-card count="{{ count($onProgressRequestData) }}" title="On Progress" />
                            <x-dashboard-card count="{{ count($completedRequestData) }}" title="Completed" />
                            <x-dashboard-card count="{{ count($reviewCompletedRequestData) }}"
                                title="Review Completed Request" />
                            <x-dashboard-card count="{{ count($aprroveCompletedRequestData) }}"
                                title="Approve Completed Request" />
                            <x-dashboard-card count="{{ count($closedRequestData) }}" title="Closed Request" />

                        </div>
                    </div>
                    <!-- END: General Report -->
                </div>

            </div>

        </div>

    </div>

</section>
