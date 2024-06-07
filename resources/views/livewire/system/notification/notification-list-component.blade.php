<x-notification-list :count="count($notificationData)">
    @foreach ($notificationData as $item)
        <x-notification-list-item title="{{ $item->title }}"
            href="{{ $item->parameter == null ? route($item->url) : route($item->url, ['hash' => $item->request->hash]) }}"
            wire:navigate description="Reference #: {{ $item->description }}" timeStamp="{{ $item->created_at }}" />
    @endforeach
</x-notification-list>
