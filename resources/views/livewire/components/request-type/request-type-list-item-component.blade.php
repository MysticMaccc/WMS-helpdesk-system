<section>
    <tr>
        <x-td>{{ $data->name }}</x-td>
        <x-td>{{ $data->department->name }}</x-td>
        <x-td>{{ $data->category->name }}</x-td>
        <x-td>

            <x-dropdown>
                <x-dropdown-link title="Edit" href="{{ route('request-type.edit', ['hash' => $data->hash]) }}" />
            </x-dropdown>
        </x-td>
    </tr>
</section>
