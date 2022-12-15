@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed items-center bg-blue-500 text-white py-2 px-4 rounded-xl text-lg inset-x-10 top-20"
        >
        <p>{{ session('success') }}</p>
    </div>
@endif
