@props(['id', 'type' => 'text', 'old' => false, 'error' => false])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $id }}">{{ $slot }}
    </label>
    <input class="border border-gray-400 p-2 w-full" type="{{ $type }}" name="{{ $id }}"
        id="{{ $id }}" value="{{ $old ? old($id) : '' }}" required>

    @if ($error)
        @error($id)
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    @endif

</div>
