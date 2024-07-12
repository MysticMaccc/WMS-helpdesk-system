@props(['title', 'id'])
<div data-transition="" data-selector=".active" data-enter="transition-[visibility,opacity] ease-linear duration-150"
    data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100"
    data-leave="transition-[visibility,opacity] ease-linear duration-150" data-leave-from="visible opacity-100"
    data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="{{ $id }}" role="tabpanel"
    aria-labelledby="view-history-tab" class="tab-pane ">
    <div class="intro-y box col-span-12 lg:col-span-6">
        <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400">
            <h2 class="mr-auto text-base font-medium">
                {{ $title }}
            </h2>
        </div>
        <div class="p-5">
            <div class="tab-content">
                <div data-transition="" data-selector=".active"
                    data-enter="transition-[visibility,opacity] ease-linear duration-150"
                    data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0" data-enter-to="visible opacity-100"
                    data-leave="transition-[visibility,opacity] ease-linear duration-150"
                    data-leave-from="visible opacity-100" data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0"
                    id="work-in-progress-new" role="tabpanel" aria-labelledby="work-in-progress-new-tab"
                    class="tab-pane active">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
