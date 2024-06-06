<x-main-layout :title="$title">

    <div x-data="{ requestMessage: $wire.actionMessage }">
        <template x-if="requestMessage">
            <x-action-message />
        </template>
    </div>

    <livewire:components.request.request-list-component />

</x-main-layout>
