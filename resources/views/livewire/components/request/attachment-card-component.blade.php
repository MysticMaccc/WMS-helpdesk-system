<x-card title="Attachments" class="basis-full">
    @if (count($data->attachment) > 0)
        <livewire:components.request.attachment-list-component :data="$data" />
    @else
        <p class="text-danger font-bold text-xl">No attachments to show...</p>
    @endif
</x-card>
