<section>
    <x-topbar title="User-Type" />
    <x-main-layout :title="$title">
        <div class="col-span-1 md:col-span-9 lg:col-span-12" x-data="{ requestMessage: $wire.actionMessage }">
            <div x-show="requestMessage">
                <x-action-message x-on:click="$wire.destroyRequestMessage()" />
            </div>
        </div>

        <livewire:components.user-type.user-type-list-component />
    </x-main-layout>
</section>