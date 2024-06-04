<tr>
    <x-td>{{ $data->level }}</x-td>
    <x-td>{{ $data->request_type_status->name }}</x-td>
    <x-td>{{ $data->approver->full_name }}</x-td>

    <x-td>
        <x-button wire:click="destroy('{{ $data->hash }}')"
            wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">Delete</x-button>
    </x-td>

</tr>
