@props(['param'])

@if (session()->has($param))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bottom-0 right-0 bg-green-100 border border-green-200 py-2 px-4 rounded-xl m-6">
        <p>{{ session($param) }}</p>
    </div>
@endif
