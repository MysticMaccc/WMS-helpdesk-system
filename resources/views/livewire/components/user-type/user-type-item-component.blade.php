<tr>
    <x-td>{{ $data->name }}</x-td>
    <x-td>{{ $data->modified_by }}</x-td>
    <x-td>{{ $data->created_at }}</x-td>
    <x-td>{{ $data->updated_at }}</x-td>
    <x-td>
        <x-dropdown>
            <x-dropdown-link title="Edit" href="{{ route('user-type.edit', ['hash' => $data->hash]) }}" />
        </x-dropdown>
    </x-td>
</tr>