<x-table-list listTitle="{{ $listTitle }}" :data="$requestData">

    <x-slot:buttonSlot>

        <x-list-button title="Create Request" wire:click="create()" />

        {{-- <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown> --}}

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Reference #</x-th>
        <x-th>Request Type</x-th>
        <x-th>Category</x-th>
        <x-th>Requested By</x-th>
        <x-th>Department</x-th>
        <x-th>Details</x-th>
        <x-th>Cost</x-th>
        <x-th>Created Date</x-th>
        <x-th>Status</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($requestData as $item)
        <livewire:components.request.request-list-item-component wire:key="{{ $item->id }}" :data="$item" />
    @endforeach

</x-table-list>
