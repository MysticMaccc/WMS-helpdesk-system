<x-card title="History" class="basis-full">
    @if ($hash != null)
        <p class="mt-2 font-semibold">
            <label class="text-sm font-semibold">Created By:</label>
            <small class="text-xs italic">
                {{ $data->user->full_name }}
                {{ $data->created_at }}
            </small>
        </p>
        <hr />
        @foreach ($data->request_update_log as $item)
            <p class="mt-2 font-semibold">
                <label class="text-sm">{{ $item->status->name }} By: </label>
                <small class="text-xs italic">
                    {{ $item->modified_by }}
                    {{ $item->created_at }}
                </small>
            </p>
            <hr />
        @endforeach
    @else
        <p class="text-danger font-bold text-xl">No history to show...</p>
    @endif
</x-card>
