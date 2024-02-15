<x-layout>
    <x-slot name="content">
        @if (auth()->check())
            <main class="max-w-6xl mx-auto mt-6 space-y-6">
                <h1 class="text-3xl text-center my-6">{{ $dictionary->name }}</h1>
                @if ($words->count())
                    <x-word.grid :words="$words" :dictionary="$dictionary" />
                @else
                    <p class="text-center">Dictionary is empty.</p>
                @endif
            </main>
        @endif
    </x-slot>
    <x-slot name="menu">
        @if (auth()->check())
            <x-button noColor noPadding link href="/dictionary-create">Create dictionary</x-button>
            <hr class="mx-6 my-1" />
            <x-button noColor noPadding link href="/dictionary/{{ $dictionary->slug }}/add">Add word</x-button>
            <x-button noColor noPadding link href="/dictionary/{{ $dictionary->slug }}/export" target="_blank">Export
                dictionary</x-button>
            <form enctype="multipart/form-data" method="post" action="/dictionary/{{ $dictionary->slug }}/import">
                @csrf
                <input id="file" name="file" type="file" style="" />
                <!-- <x-button noColor noPadding noSubmit onclick="document.getElementById('file').();">Select -->
                <!-- import file</x-button> -->
                <x-button noColor noPadding>Import
                    dictionary</x-button>
            </form>

            <hr class="mx-6 my-1" />
        @endif
    </x-slot>
</x-layout>
