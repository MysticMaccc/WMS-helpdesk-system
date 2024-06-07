<tr>
    <x-td>{{ $data->name }}</x-td>
    <x-td>{{ $data->assigned_user_department->full_name }}</x-td>
    <x-td>{{ $data->modified_by }}</x-td>
    <x-td>{{ $data->created_at }}</x-td>
    <x-td>{{ $data->updated_at }}</x-td>
    <x-td>
        <x-dropdown>
            <x-dropdown-link title="Edit" href="{{ route('department.edit', ['hash' => $data->hash]) }}" />
        </x-dropdown>
    </x-td>
</tr>