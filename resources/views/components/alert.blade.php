@props([
    'type' => 'success',
    'title' => null,
])

<div {{ $attributes->merge(['class' => 'alert alert-' . $type]) }} role="alert">
    @if ($title)
        <p class="alert-title">{{ $title }}</p>
    @endif

    <div class="alert-text">{{ $slot }}</div>
</div>
