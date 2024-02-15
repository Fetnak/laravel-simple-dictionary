<x-layout>
    <x-slot name="content">
        @if (auth()->check())
            @if ($dictionaries->count())
                <x-dictionary.grid :dictionaries="$dictionaries" />
            @else
                <p class="text-center">No dictionaries.</p>
            @endif
        @endif
    </x-slot>

    <x-slot name="header">
        @if (auth()->check())
            <x-dictionary.search-bar />
        @endif
    </x-slot>

    <x-slot name="menu">
        @if (auth()->check())
            <x-button noColor noPadding link href="/dictionary-create">Create dictionary</x-button>
            <hr class="mx-6 my-1" />
        @endif
    </x-slot>
</x-layout>
