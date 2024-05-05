<tr>
    <x-td>{{ $data->name }}</x-td>
    <x-td>

        <x-dropdown>
            <x-dropdown-link title="Edit" href="{{ route('request-type-status.edit', ['hash' => $data->hash]) }}" />
        </x-dropdown>
    </x-td>
</tr>