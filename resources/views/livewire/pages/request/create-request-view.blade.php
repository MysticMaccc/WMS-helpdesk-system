<x-main-layout :title="$title">

    <div class="col-span-1 md:col-start-1 md:col-span-5 lg:col-start-1 lg:col-span-6">
        <x-form-section submit="{{ $hash !== null ? 'update' : 'store' }}" enctype="multipart/form-data">

            <x-slot:title>{{ $subTitle }}</x-slot:title>
            <x-slot:description>
                {{ $description }}
                @if ($hash != null)
                    <p>Approver: {{ $nextStatusData->approver->full_name }}</p>
                @endif
            </x-slot:description>

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
                @if ($hash != null)
                    @if ($requestData->status_id == 3)
                        <div class="w-full">
                            <x-select-input wireModel="assignTo" label="Assign to" :data="$userData"
                                wire:model="assignTo" />
                        </div>
                    @endif
                @else
                    <div class="w-full">
                        <x-input type="file" label="Select Attachments" wireModel="attachments"
                            wire:model="attachments" multiple />
                    </div>
                @endif

            </x-slot:form>

            <x-slot:actions>
                @if (optional($requestData)->status_id != 8)
                    <x-button type="submit">{{ $hash !== null ? 'Save' : 'Create Request' }}</x-button>
                @endif
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('request.index') }}" wire:navigate />
        </x-form-section>
    </div>

    <div class="flex flex-col gap-4 col-span-1 md:col-start-6 md:col-span-4 lg:col-start-7 lg:col-span-6">
        <x-card title="History" class="basis-full">
            @if ($hash != null)
                <p class="mt-2 font-semibold">
                    <label class="text-sm font-semibold">Created By:</label>
                    <small class="text-xs italic">
                        {{ $requestData->user->full_name }}
                        {{ $requestData->created_at }}
                    </small>
                </p>
                <hr />
                @foreach ($requestData->request_update_log as $item)
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

        <x-card title="Attachments" class="basis-full">
            @if ($hash != null)
                <livewire:components.request.attachment-list-component :data="$requestData" />
            @else
                <p class="text-danger font-bold text-xl">No attachments to show...</p>
            @endif
        </x-card>

    </div>

</x-main-layout>
