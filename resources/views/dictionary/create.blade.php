<x-layout>
    <x-slot name='content'>
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 p-6 border border-gray-200 rounded-xl">

            <h1 class="text-xl font-bold text-center mb-10">Create Dictionary</h1>

            <form method="POST" action="/dictionary-create">
                @csrf

                <x-input id='name' old error>Name</x-input>

                <x-button>Create</x-button>
            </form>
        </main>
    </x-slot>
</x-layout>
