<x-main-layout :title="$title">

    <div class="col-span-1 md:col-start-3 md:col-span-5 lg:col-start-3 lg:col-span-6">
        <x-form-section submit="{{ $hash !== null ? 'update' : 'store' }}">

            <x-slot:title>Company Form</x-slot:title>
            <x-slot:description>Here you can create or edit company.</x-slot:description>

            <x-slot:form>
                <div class="w-full">
                    <x-input label="Company" wireModel="name" wire:model="name" />
                </div>
                <div class="w-full">
                    <x-input label="Max User" wireModel="maxUser" wire:model="maxUser" />
                </div>
                <div class="w-full">
                    <x-select-input wireModel="isSubscribed" wire:model="isSubscribed" label="Is Subscribed?"
                        :data="$subscribedData" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                @if ($hash != null)
                    <x-red-button type="button"
                        wire:confirm.prompt="Renew subscription?\n\nType RENEW to confirm|RENEW"
                        wire:click="updateSubscription()">Renew</x-red-button>
                @endif
                <x-button type="submit">{{ $hash !== null ? 'Update' : 'Save' }}</x-button>
            </x-slot:actions>

            <x-anchor title="Go back" href="{{ route('company.index') }}" wire:navigate />
        </x-form-section>
    </div>

</x-main-layout>
