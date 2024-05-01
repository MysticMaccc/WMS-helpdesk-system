<x-main-layout :title="$title">

    <div class="col-span-1 md:col-start-3 md:col-span-5 lg:col-start-3 lg:col-span-6">
        <x-form-section submit="{{ $hash !== NULL ? 'update' : 'store' }}">

            <x-slot:title>Request Type Form</x-slot:title>
            <x-slot:description>Here you can create or edit request type.</x-slot:description>

            <x-slot:form>
                <div class="w-full">
                    <x-select-input wireModel="department" wire:model="department" label="Select Department"
                        :data="$departmentData" />
                </div>
                <div class="w-full">
                    <x-select-input wireModel="category" wire:model="category" label="Select Category" :data="$categoryData" />
                </div>
                <div class="w-full">
                    <x-input label="Name" wireModel="name" wire:model="name" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                <x-red-button type="button" wire:click="reset()">Cancel</x-red-button>
                <x-button type="submit">{{ $hash !== NULL ? 'Update' : 'Save' }}</x-button>
            </x-slot:actions>

        </x-form-section>
    </div>

</x-main-layout>
