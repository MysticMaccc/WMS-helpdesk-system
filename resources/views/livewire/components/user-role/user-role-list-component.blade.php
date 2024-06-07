<div class="col-span-1 md:col-span-5 md:col-start-3 lg:col-span-8 lg-col-start-3">
    <x-table-list listTitle="{{ $listTitle }}" :data="$userRoleData">
        <x-slot:headSlot>
            <x-th>User</x-th>
            <x-th>Role</x-th>
        </x-slot:headSlot>

        @foreach ($userRoleData as $item)
        <livewire:components.user-role.user-role-list-item-component :data="$item" :key="$item->id" />
        @endforeach

    </x-table-list>
</div>