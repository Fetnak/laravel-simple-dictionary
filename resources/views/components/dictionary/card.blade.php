@props(['dictionary'])

<article
    {{ $attributes(['class' => 'transition-colors duration-300 bg-gray-100 border border-gray-200 hover:bg-gray-200 rounded-xl m-1']) }}>

    <div class="p-6">
        <form method="POST" action="/dictionary/{{ $dictionary->slug }}" onsubmit="return confirm('Are you sure you want to delete full dictionary with all words?');">
            @csrf
            @method('DELETE')
            <div class="">
                <button type="submit" class="flex ml-auto"><x-icon icon="trashcan" class="w-6 h-6" color="#777777" /></button>
            </div>
        </form>
        <div class="mt-3 flex flex-col justify-between">
            <div class="mt-4">
                <h1 class="text-5xl">
                    {{ $dictionary->name }}
                </h1>

                <span class="mt-2 block text-gray-400 text-xs">
                    Created <time>{{ $dictionary->created_at->diffForHumans() }}</time>
                </span>
            </div>

            <x-button href="/dictionary/{{ $dictionary->slug }}" noPadding noColor link
                class="mr-auto bg-gray-300 border-current border border-gray-600 hover:bg-gray-600 hover:text-white py-2 px-4 mt-6 w-max">Show
                words</x-button>
        </div>
    </div>
</article>
