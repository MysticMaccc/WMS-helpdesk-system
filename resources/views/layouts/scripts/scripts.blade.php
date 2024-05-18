@push('scripts')
<script>
    Livewire.on('d_modal', (event) => {
        $(event.detail.id).modal(event.detail.do);
    });
</script>
@endpush