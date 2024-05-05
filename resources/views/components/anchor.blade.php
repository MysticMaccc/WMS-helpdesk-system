@props(['title'])
<a {{ $attributes->merge(['class'=>'text-sm text-blue-900 hover:text-blue-600']) }}>
    {{ $title }}
</a>