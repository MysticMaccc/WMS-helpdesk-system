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
                        wire:model.live="requestType" disabledProp="{{ $disableRequestType }}" />
                </div>

                <div class="w-full">
                    <x-static-table>
                        <x-slot:thead>
                            <th class="px-6 py-3">Details</th>
                            <th class="px-6 py-3">Cost</th>
                            <th class="px-6 py-3">Action</th>
                        </x-slot:thead>

                        <x-slot:tbody>
                            @foreach ($details as $index => $detail)
                                <x-static-tr>
                                    <td class="px-6 py-4 w-40">
                                        <input type="text" class="py-1 w-40" wire:model="details.{{ $index }}"
                                            {{ $hash !== null ? 'disabled' : '' }}>
                                    </td>
                                    <td class="px-6 py-4 w-20">
                                        @if ($hash != null)
                                            <input type="text" class="py-1 w-20"
                                                wire:model="cost.{{ $index }}">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($hash == null)
                                            <button type="button"
                                                class="px-2 py-1 text-xs text-stone-100 bg-red-700 rounded-lg"
                                                wire:click="removeRow({{ $index }})">Remove</button>
                                        @endif
                                    </td>
                                </x-static-tr>
                            @endforeach
                        </x-slot:tbody>
                        <x-static-tr>
                            @if ($hash == null)
                                <td colspan="3" class="py-1">
                                    <x-button type="button" class="float-end text-xs px-1 py-1"
                                        wire:click="addRow()">Add
                                        Row</x-button>
                                </td>
                            @endif
                        </x-static-tr>
                    </x-static-table>
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

        <livewire:components.request.history-card-component :hash="$hash" :data="$requestData" />
        <livewire:components.request.attachment-card-component :data="$requestData" />

    </div>

</x-main-layout>
