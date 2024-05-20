<x-main-layout :title="$title">
    <div class="col-span-1 md:col-start-3 md:col-span-5 lg:col-start-3 lg:col-span-6">
        <x-form-section submit="{{ $hash !== null ? 'update' : 'store' }}">

            <x-slot:title>Department Form</x-slot:title>
            <x-slot:description>Here you can create or edit department.</x-slot:description>

            <x-slot:form>
                <div class="w-full">
                    <x-select-input wireModel=department wire:model="user_id" :data="$users" label="Select User" />
                </div>
                <div class="w-full">
                    <x-input label="Enter Department" wireModel="department" wire:model="department" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                @if ($hash != null)
                <x-red-button type="button" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE" wire:click="destroy('{{ $hash }}')">Delete</x-red-button>
                @endif
                <x-button type="submit">{{ $hash !== null ? 'Update' : 'Save' }}</x-button>
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('department.index') }}" wire:navigate />
        </x-form-section>
    </div>

</x-main-layout>