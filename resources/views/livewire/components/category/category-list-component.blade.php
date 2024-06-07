<x-table-list listTitle="{{ $listTitle }}" :data="$categoryData" wire:model.live="search">

    <x-slot:buttonSlot>

        <x-list-button title="Create Category" wire:click="create()" />

        <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown>

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Category</x-th>
        <x-th>Modified By</x-th>
        <x-th>Created At</x-th>
        <x-th>Updated At</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($categoryData as $item)
    <livewire:components.category.category-list-item-component :data="$item" wire:key="{{ $item->id }}" />
    @endforeach

</x-table-list>