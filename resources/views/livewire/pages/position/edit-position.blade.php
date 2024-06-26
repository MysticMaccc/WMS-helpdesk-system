<x-main-layout :title="$title">
    <div class="col-span-1 md:col-start-3 md:col-span-5 lg:col-start-3 lg:col-span-6">
        <x-form-section submit="{{ $hash !== null ? 'update' : 'store' }}">

            <x-slot:title>Position Form</x-slot:title>
            <x-slot:description>Here you can create or edit position.</x-slot:description>

            <x-slot:form>
                <div class="w-full">
                    <x-input label="Enter position" wireModel="position" wire:model="position" />
                </div>
                @if (Auth::user()->user_type_id == 1)
                    <div class="w-full">
                        <x-select-input wireModel="company" label="For Company" :data="$companyData" wire:model="company" />
                    </div>
                @endif
            </x-slot:form>

            <x-slot:actions>
                @if ($hash != null)
                    <x-red-button type="button" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                        wire:click="destroy('{{ $hash }}')">Delete</x-red-button>
                @endif
                <x-button type="submit">{{ $hash !== null ? 'Update' : 'Save' }}</x-button>
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('position.index') }}" wire:navigate />
        </x-form-section>
    </div>
</x-main-layout>
