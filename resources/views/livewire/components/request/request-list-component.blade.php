<x-table-list listTitle="{{ $listTitle }}" :data="$requestData" wire:model.live="search" placeholder="Search reference #">

    <x-slot:buttonSlot>

        <x-list-button title="Create Request" wire:click="create()" />

        {{-- <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown> --}}

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Reference #</x-th>
        <x-th>
            <x-TheadSelectOption :data="$requestTypeData" defaultOption="Request Type" wire:model.live="requestType" class="w-28" />
        </x-th>
        <x-th>
            <x-TheadSelectOption :data="$categoryData" defaultOption="Category" wire:model.live="category" class="w-28" />

        </x-th>
        <x-th>Requested By</x-th>
        <x-th>
            <x-TheadSelectOption :data="$departmentData" defaultOption="Department" wire:model.live="department" class="w-36" />
        </x-th>
        <x-th>Cost</x-th>
        <x-th>
            <x-TheadSelectOption :data="$assignedPersonnelData" defaultOption="Assigned To" wire:model.live="assignedTo" class="w-36" />
        </x-th>
        <x-th>Requested At</x-th>
        <x-th>
            <x-TheadSelectOption :data="$statusData" defaultOption="Status" wire:model.live="status" class="w-28" />
        </x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($requestData as $item)
    <livewire:components.request.request-list-item-component wire:key="{{ $item->id }}" :data="$item" />
    @endforeach

</x-table-list>