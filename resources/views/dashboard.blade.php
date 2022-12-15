<x-fardelli.layout class="bg-slate-500" >

    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- ADMIN PANEL -->
        <div class="block md:m-10 m-4 md:p-10 p-2 bg-slate-200 rounded-xl">

        <x-fardelli.adminpanel />

        </div>

        <!-- crea nuovo post -->
        <div class="md:m-6 m-2 md:p-6 p-2 text-center">
            <a href="/posts/create" class="md:px-4 px-2 md:text-2xl text-lg tracking-wide border-2 border-green-600 bg-green-400 rounded-xl p-1 hover:border-red-600 hover:bg-red-400 shadow-lg">Scrivi un nuovo post</a>
        </div>

    </div>
</x-fardelli.layout>