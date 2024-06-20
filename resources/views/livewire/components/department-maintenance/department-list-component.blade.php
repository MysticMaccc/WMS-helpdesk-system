<x-table-list listTitle="{{ $listTitle }}" :data="$departmentData" wire:model.live="search">

    <x-slot:buttonSlot>

        <x-list-button title="Create Department" wire:click="create()" />

        {{-- <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown> --}}

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Department</x-th>
        <x-th>Full Name</x-th>
        <x-th>Company</x-th>
        <x-th>Modified By</x-th>
        <x-th>Created At</x-th>
        <x-th>Updated At</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($departmentData as $item)
        <livewire:components.department-maintenance.department-list-item-component :data="$item"
            wire:key="{{ $item->id }}" />
    @endforeach

</x-table-list>
