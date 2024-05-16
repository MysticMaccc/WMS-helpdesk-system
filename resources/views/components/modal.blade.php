<section>

<!-- BEGIN: Modal Content -->
<div data-tw-backdrop="" aria-hidden="false" tabindex="-1" id="header-footer-modal-preview" class="modal modal-dialog-centered group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s] overflow-y-auto show" style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
    <div class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px]">
        {{ $slot }}
    </div>
</div>
<!-- END: Modal Content -->
</section>