<x-table-list listTitle="{{ $listTitle }}" :data="$requestTypeData">

    <x-slot:buttonSlot>

        <x-list-button title="Create Request Type" wire:click="create()" />

        <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown>

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Request Type</x-th>
        <x-th>Department</x-th>
        <x-th>Category</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($requestTypeData as $item)
        <livewire:components.request-type.request-type-list-item-component :data="$item" />
    @endforeach

</x-table-list>
