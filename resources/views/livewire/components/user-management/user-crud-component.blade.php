<section>
    <x-topbar :title="$title" />
    <div class="col-span-1 md:col-span-9 lg:col-span-12" x-data="{ requestMessage: $wire.actionMessage }">
        <div x-show="requestMessage">
            <x-action-message x-on:click="$wire.destroyRequestMessage()" />
        </div>
    </div>

    @if ($alert)
    <div class="intro-x flex flex-nowrap mt-5 mb-3">
        <div class="flex-auto h-10 bg-green-400 rounded-full">
            <div class="mt-3 flex items-center pl-5 justify-start font-bold text-slate-900  align-block">
                <div class="flex-auto">User Created!</div>
                <div wire:click="changeAlert" class="flex-auto text-end pe-5 text-red-700 cursor-pointer">X</div>
            </div>
        </div>
    </div>
    @endif

    <x-card-two title="Fill Up Informations">
        <div class="flex flex-nowrap m-4 gap-5">
            <div class="flex-auto">
                <x-input-two wireModel="firstName" label="First Name" type="text"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="First name" />
            </div>
            <div class="flex-auto">
                <x-input-two wireModel="middleName" label="Middle Name" type="text"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="Middle name" />
            </div>
            <div class="flex-auto">
                <x-input-two wireModel="lastName" label="Last Name" type="text"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="Last name" />
            </div>
            <div class="flex-auto">
                <x-input-two wireModel="suffix" label="Suffix" type="text"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="Suffix" />
            </div>
        </div>
        <div class="flex flex-nowrap m-4 gap-5">
            <div class="flex-auto">
                <x-label class="">Department</x-label>
                <select wire:model="departmentId" class="w-full rounded-md text-slate-700" name="" id="">
                    <option selected value="0">None</option>
                    @foreach ($departmentData as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('departmentId')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex-auto">
                <x-label class="">User Type</x-label>
                <select wire:model="userTypeId" class="w-full rounded-md text-slate-700" name="" id="">
                    <option selected value="0">None</option>
                    @foreach ($userTypeData as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('userTypeId')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex-auto">
                <x-label class="">Positions</x-label>
                <select wire:model="positionId" class="w-full rounded-md text-slate-700" name="" id="">
                    <option selected value="0">None</option>
                    @foreach ($positionData as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('positionId')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-nowrap m-4 gap-5">
            <div class="flex-auto">
                <x-input-two wireModel="email" label="Email Address" type="email"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="Email" />
            </div>
            <div class="flex-auto">
                <x-input-two wireModel="password" label="Password" type="password"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="Password" />
            </div>
            <div class="flex-auto">
                <x-input-two wireModel="rePassword" label="Confirm Password" type="password"
                    class="w-full text-slate-500 rounded-md h-10 font-sm" placeholder="Confirm Password" />
            </div>
        </div>

        <x-slot:footer>
            <div class="flex">
                <button wire:click="store"
                    class="flex-auto m-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
            </div>
        </x-slot:footer>
    </x-card-two>
</section>