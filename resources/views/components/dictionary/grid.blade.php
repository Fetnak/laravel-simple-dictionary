@props(['dictionaries'])

@if ($dictionaries->count())
    <div class="lg:grid lg:grid-cols-3">
        @foreach ($dictionaries as $dictionary)
            <x-dictionary.card :dictionary="$dictionary" class="col-span-1" />
        @endforeach
    </div>
@endif

