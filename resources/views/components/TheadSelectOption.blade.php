@props(['defaultOption', 'data'])
<select data-tw-merge="" aria-label="Default select example"
    {{ $attributes->merge(['class' => 'text-gray-900  text-sm rounded-lg']) }}>
    <option value="">{{ $defaultOption }}</option>
    @foreach ($data as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
