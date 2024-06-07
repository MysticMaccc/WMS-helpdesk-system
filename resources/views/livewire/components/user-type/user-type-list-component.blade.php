<x-table-list listTitle="{{ $listTitle }}" :data="$userTypeData" wire:model.live="search">

    <x-slot:buttonSlot>

        <x-list-button title="Create User Type" wire:click="create()" />

        <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown>

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>User Type</x-th>
        <x-th>Modified By</x-th>
        <x-th>Created At</x-th>
        <x-th>Updated At</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($userTypeData as $item)
    <livewire:components.user-type.user-type-item-component :data="$item" wire:key="{{ $item->id }}" />
    @endforeach

</x-table-list>