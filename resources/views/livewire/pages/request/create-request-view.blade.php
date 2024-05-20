<x-main-layout :title="$title">

    <div class="col-span-1 md:col-start-3 md:col-span-5 lg:col-start-3 lg:col-span-6">
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
            </x-slot:form>

            <x-slot:actions>
                <x-button type="submit">{{ $hash !== null ? 'Approve' : 'Create Request' }}</x-button>
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('request.index') }}" wire:navigate />
        </x-form-section>
    </div>

</x-main-layout>
