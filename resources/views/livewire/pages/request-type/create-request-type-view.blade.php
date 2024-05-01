<x-main-layout :title="$title">

    <div class="col-span-1 md:col-start-3 md:col-span-5 lg:col-start-3 lg:col-span-6">
        <x-form-section submit="store">

            <x-slot:title>Request Type Form</x-slot:title>
            <x-slot:description>Here you can create or edit request type.</x-slot:description>

            
                <x-slot:form>
                    <x-input label="Name" wireModel="name" wire:model="name" />
                </x-slot:form>
            </div>

            <x-slot:actions>
                <x-button type="submit" >Save</x-button>
            </x-slot:actions>

        </x-form-section>
    </div>

</x-main-layout>
