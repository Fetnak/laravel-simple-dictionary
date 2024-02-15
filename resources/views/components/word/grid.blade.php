@props(['dictionary', 'words'])

@if ($words->count())
    <div class="lg:grid lg:grid-cols-3">
        @foreach ($words as $word)
            <x-word.card :dictionary="$dictionary" :word="$word" class="col-span-1" />
        @endforeach
    </div>
@endif
