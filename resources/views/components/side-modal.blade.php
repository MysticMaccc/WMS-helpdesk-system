@props(['title'])
<div data-tw-backdrop="static" aria-hidden="true" tabindex="-1" id="basic-modal-preview" class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]  overflow-y-auto show  " style=" z-index: 10000;">
    <div data-tw-merge class="h-full w-full sm:w-[460px] fixed right-0 top-0 bg-white dark:bg-darkmode-600 transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-96 group-[.show]:mt-0 group-[.modal-static]:scale-[1.05]">
        <div class="bg-white p-6 rounded-lg overflow-hidden shadow-xl h-full w-full sm:w-[460px] fixed right-0 top-0">
            <!-- Modal header -->
            <div class="flex items-start justify-between">
                <div class="text-left w-full">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $title }}
                    </h3>
                </div>

                <button x-on:click="sideModal = false, sideDepartmentModal = false"> <span class="cursor-pointer">✕</span></button>
            </div>
            {{$slot}}
        </div>
    </div>
</div>