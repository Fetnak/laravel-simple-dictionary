@props(['dictionary', 'word'])

<div x-data="{ show: false }" @click.away="show = false">
    <div @click="show = true"
        class='transition-colors duration-300 bg-gray-100 border border-gray-200 hover:bg-gray-200 rounded-xl m-1'>

        <div class="py-3 px-3">
            <div x-show="!show" class="flex justify-between items-centered">
                <p class="text-2xl truncate">
                    {{ $word->word }}
                </p>

                <p class="text-xl text-blue-900 truncate">
                    {{ $word->translation }}
                </p>
            </div>
            <div x-show="show" class="" style="display: none">
                <form method="POST" action="/dictionary/{{ $dictionary->slug }}/delete/{{ $word->id }}">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <button type="submit" class="flex ml-auto"><x-icon icon="trashcan" class="w-6 h-6"
                                color="#777777" /></button>
                    </div>
                </form>

                <p class="text-base break-all max-h-26">
                    {{ $word->word }}
                </p>

                <p class="text-base text-blue-900 break-all max-h-26"">
                    {{ $word->translation }}
                </p>

            </div>
        </div>
    </div>
</div>
