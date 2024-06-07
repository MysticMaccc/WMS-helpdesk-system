<x-table-list listTitle="{{ $listTitle }}" :data="$approverData">
    
    <x-slot:headSlot>
        <x-th>Level</x-th>
        <x-th>Process</x-th>
        <x-th>Approver</x-th>
        <x-th>Action</x-th>
    </x-slot:headSlot>

    @foreach ($approverData as $item)
        <livewire:components.request-type-approver.request-type-approver-list-item-component :requesttypedata="$requesttypedata" 
        :data="$item" wire:key="{{ $item->id }}" />
    @endforeach

</x-table-list>
