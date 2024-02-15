<form method="GET" action="/">
    <div class="relative flex items-center">
        <input type="text" name="search" placeholder="Type search here"
            class="bg-transparent placeholder-gray bg-gray-100 border border-gray-200 rounded px-3 py-2"
            value={{ request('search') }}>
        <x-button noPadding class="px-3 py-2 ml-3">Search</x-button>
    </div>
</form>
