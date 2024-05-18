<tr>
    <x-td>{{ $data->level }}</x-td>
    <x-td>{{ $data->request_type_status->name }}</x-td>
    <x-td>{{ $data->approver->full_name }}</x-td>

    <x-td>

        {{-- <x-dropdown>
            <x-dropdown-link title="Edit" href="{{ route('request-type.edit', ['hash' => $data->hash]) }}" />
            <x-dropdown-link title="Assign approvers"
                href="{{ route('request-type-approver.create', ['hash' => $data->hash]) }}" />
        </x-dropdown> --}}
        
    </x-td>

</tr>
