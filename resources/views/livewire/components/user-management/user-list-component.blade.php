<x-user-table-list :data="$userData" wire:model.live="search">
    @foreach ($userData as $item)
    <livewire:components.user-management.user-list-item-component :data="$item" wire:key="{{ $item->id }}" />
    @endforeach
</x-user-table-list>