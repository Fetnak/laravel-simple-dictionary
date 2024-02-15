@props(['link' => false, 'noColor' => false, 'noPadding' => false, 'small' => false, 'noSubmit' => false])

@php
    $tag = $link ? 'a' : 'button';
    $class = 'text-black rounded flex';
    if (!$noColor) {
        $class .= ' bg-blue-200 border border-blue-500 hover:bg-blue-500 hover:text-white';
    }
    if (!$noPadding) {
        $class .= ' py-2 px-4 ml-auto';
    }
    if ($small) {
        $class .= ' text-xs uppercase font-bold p-3';
    }
@endphp

<div>
    <{{ $tag }} {{ $attributes(['class' => $class]) }} {{ $noSubmit ? '' : 'type=\'submit\'' }}>
        {{ $slot }}
        </{{ $tag }}>
</div>
