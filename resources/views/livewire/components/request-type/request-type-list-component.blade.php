<div>
    <x-table-list listTitle="{{ $listTitle }}" :data="$requestTypeData">

        <x-slot:buttonSlot>
            
            <x-list-button title="Create Request Type" wire:click="create()" />

            <x-dropdown>
                <x-dropdown-link title="Print" />
                <x-dropdown-link title="Export" />
            </x-dropdown>

        </x-slot:buttonSlot>

        <x-slot:headSlot>
        </x-slot:headSlot>
        
    </x-table-list>
</div>
