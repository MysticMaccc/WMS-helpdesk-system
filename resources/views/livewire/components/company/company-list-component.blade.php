<x-table-list listTitle="{{ $listTitle }}" :data="$companyData" wire:model.live="search">

    <x-slot:buttonSlot>

        <x-list-button title="Create Company" wire:click="create()" />

        {{-- <x-dropdown>
            <x-dropdown-link title="Print" />
            <x-dropdown-link title="Export" />
        </x-dropdown> --}}

    </x-slot:buttonSlot>

    <x-slot:headSlot>
        <x-th>Company</x-th>
        <x-th>Max User</x-th>
        <x-th>Is Subscribed?</x-th>
        <x-th>Subscribed At</x-th>
        <x-th>Expired At</x-th>
        <x-th>Modified By</x-th>
        <x-th>Created At</x-th>
        <x-th>Updated At</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($companyData as $item)
        <livewire:components.company.company-list-item-component :data="$item" wire:key="{{ $item->id }}" />
    @endforeach

</x-table-list>
