@props(['name', 'nome'])

<div class="mt-4 flex flex-col">
    <label for="{{ $name }}" class="text-xl pb-2">{{ strtoupper($nome) }}</label>
    <!-- rows="30" -->
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        required
        class="h-80 rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >{{ old($name) }}</textarea>

    @error($name)
        <p class="text-red-500 text-xs mt2">{{ $message }}</p>
    @enderror
</div>