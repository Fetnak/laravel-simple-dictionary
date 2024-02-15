<x-layout>
    <x-slot name='content'>
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 p-6 border border-gray-200 rounded-xl">

            <h1 class="text-xl font-bold text-center mb-10">Add Word</h1>

            <form method="POST" action="/dictionary/{{$dictionary->slug}}/add">
                @csrf

                <x-input id='word' old error>Word</x-input>
                <x-input id='translation' old error>Translation</x-input>

                <x-button>Add</x-button>
            </form>
        </main>
    </x-slot>
</x-layout>
