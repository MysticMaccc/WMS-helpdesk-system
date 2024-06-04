<x-main-layout :title="$title">

    <div class="col-span-1 md:col-start-1 md:col-span-5 lg:col-start-1 lg:col-span-7">
        <x-form-section submit="{{ $hash !== null ? 'update' : 'store' }}">

            <x-slot:title>{{ $subTitle }}</x-slot:title>
            <x-slot:description>{{ $description }}</x-slot:description>

            <x-slot:form>
                <div class="w-full">
                    <x-select-input wireModel="requestType" label="Select Request Type" :data="$requestTypeData"
                        wire:model="requestType" />
                </div>
                <div class="w-full">
                    <x-text-area label="Enter Details" wireModel="details" wire:model="details" />
                </div>
                <div class="w-full">
                    <x-input label="Enter Cost" wireModel="cost" wire:model="cost" />
                </div>
                @if ($requestData->status_id == 3)
                    <div class="w-full">
                        <x-select-input wireModel="assignTo" label="Assign to" :data="$userData"
                            wire:model="assignTo" />
                    </div>
                @endif
            </x-slot:form>

            <x-slot:actions>
                @if ($requestData->status_id != 8)
                    <x-button
                        type="submit">{{ $hash !== null ? $requestData->status->name : 'Create Request' }}</x-button>
                @endif
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('request.index') }}" wire:navigate />
        </x-form-section>
    </div>

    <div class="col-span-1 md:col-start-6 md:col-span-4 lg:col-start-8 lg:col-span-5">
        <x-card title="History">
            @if ($hash != null)
                @foreach ($requestData->request_update_log as $item)
                    <p class="mt-2 font-semibold">{{ $item->status->name }} By:</p>
                    <p class="text-xs italic">{{ $item->modified_by }} {{ $item->created_at }}</p>
                    <hr />
                @endforeach
            @else
                <p class="text-danger font-bold text-xl">No history to show...</p>
            @endif
        </x-card>
    </div>

</x-main-layout>
