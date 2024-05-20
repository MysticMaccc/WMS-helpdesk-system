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
        <p class="text-xs">Created By: {{ $data->modified_by }}, {{ $data->created_at }}</p>
        @foreach ($data->request_update_log as $item)
            <p class="text-xs">{{ $item->status->name }} By: {{ $item->modified_by }}, {{ $item->created_at }}</p>
        @endforeach
    </x-td>
    <x-td>
        <x-button x-on:click="$wire.show('{{ $data->hash }}')">View</x-button>
    </x-td>
</tr>
