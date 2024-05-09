<x-table-list listTitle="{{ $listTitle }}" :data="$requestTypeStatusData">

    <x-slot:buttonSlot>

        <x-list-button title="Create Request Type" wire:click="create()" />

        <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown>

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Request Type Status</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($requestTypeStatusData as $item)
        <livewire:components.request-type-status.request-type-status-list-item-component :data="$item" wire:key="{{ $item->id }}" />
    @endforeach

</x-table-list>
