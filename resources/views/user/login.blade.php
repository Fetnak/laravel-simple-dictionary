<x-layout>
    <x-slot name='content'>
        <main class="max-w-lg mx-auto mt-20 bg-gray-100 p-6 border border-gray-200 rounded-xl">

            <h1 class="text-xl font-bold text-center mb-10">Log in</h1>

            <form method="POST" action="/login">
                @csrf

                <x-input id='username' old error>Username</x-input>
                <x-input id='password' type='password' error>Password</x-input>

                <x-button>Log in</x-button>
            </form>
        </main>
    </x-slot>
</x-layout>
