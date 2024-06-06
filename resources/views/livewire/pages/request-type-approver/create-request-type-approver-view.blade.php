<x-main-layout :title="$title">

    <div x-data="{ requestMessage: $wire.actionMessage }">
        <template x-if="requestMessage">
            <x-action-message  />
        </template>
    </div>
    
    <div class="col-span-1 md:col-start-1 md:col-span-4 lg:col-start-1 lg:col-span-6">
        <x-form-section submit="store">

            <x-slot:title>Assign Approver for {{ $requestTypeData->name }}</x-slot:title>
            <x-slot:description>Here you can assign and edit approvers for {{ $requestTypeData->name }}.</x-slot:description>

            <x-slot:form>
                <div class="w-full">
                    <x-select-input wireModel="user" label="Select Approver" :data="$userData" wire:model="user" />
                </div>
                <div class="w-full">
                    <x-select-input wireModel="requestTypeStatus" label="Select Status" :data="$requestTypeStatusData"
                        wire:model="requestTypeStatus" />
                </div>
                <div class="w-full">
                    <x-input label="Select level" wireModel="level" wire:model="level" type="number" min="1"
                        max="10" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                {{-- @if ($hash != null)
                    <x-red-button type="button" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                        wire:click="destroy('{{ $hash }}')">Delete</x-red-button>
                @endif --}}
                <x-button type="submit">Save</x-button>
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('request-type.index') }}" wire:navigate />
        </x-form-section>
    </div>

    <div class="col-span-1 md:col-start-6 md:col-span-4 lg:col-start-7 lg:col-span-6">
        <livewire:components.request-type-approver.request-type-approver-list-component
            requestTypeId="{{ $requestTypeData->id }}" :requesttypedata="$requestTypeData" />
    </div>

</x-main-layout>
