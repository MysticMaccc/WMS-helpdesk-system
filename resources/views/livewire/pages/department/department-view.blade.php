<section>
    <x-topbar title="Department" />

    <div class="col-span-1 md:col-span-9 lg:col-span-12" x-data="{ requestMessage: $wire.actionMessage }">
        <div x-show="requestMessage">
            <x-action-message x-on:click="$wire.destroyRequestMessage()" />
        </div>
    </div>

    <livewire:components.department-maintenance.department-list-component />
</section>