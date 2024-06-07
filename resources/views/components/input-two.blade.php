@props(['wireModel', 'label', 'disabled' => false])
<x-label for="">{{ $label }}</x-label>
<input {{$attributes}} wire:model="{{$wireModel}}">
@error($wireModel) <span class="text-red-500">{{ $message }}</span> @enderror