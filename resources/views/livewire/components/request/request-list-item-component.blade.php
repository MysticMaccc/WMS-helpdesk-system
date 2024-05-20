<tr>
    <x-td>{{ $data->reference_number }}</x-td>
    <x-td>{{ $data->request_type->name }}</x-td>
    <x-td>{{ $data->request_type->category->name }}</x-td>
    <x-td>{{ $data->request_type->modified_by }}</x-td>
    <x-td>{{ $data->department->name }}</x-td>
    <x-td>{{ $data->details }}</x-td>
    <x-td>{{ $data->cost }}</x-td>
    <x-td>{{ $data->created_at }}</x-td>
    <x-td>{{ $data->status->name }}</x-td>
    <x-td>
        <x-button x-on:click="$wire.show('{{ $data->hash }}')" >View</x-button>
    </x-td>
</tr>
