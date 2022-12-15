@props(['name', 'nome', 'type' => 'text'])

<div class="mt-4 flex flex-col">
    <label for="{{ $name }}" class="text-xl pb-2">{{ strtoupper($nome) }}</label>
    <input
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name) }}"
        required
        class="rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >

    @error($name)
        <p class="text-red-500 text-xs mt2">{{ $message }}</p>
    @enderror
</div>