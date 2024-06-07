<section>
    <x-topbar title="Request type status list" />
    <x-main-layout :title="$title">

        <div class="col-span-1 md:col-span-9 lg:col-span-12" x-data="{requestMessage:$wire.actionMessage}">
            <div x-show="requestMessage">
                <x-action-message x-on:click="$wire.destroyRequestMessage()" />
            </div>
        </div>

        <livewire:components.request-type-status.request-type-status-list-component />
    </x-main-layout>
</section>