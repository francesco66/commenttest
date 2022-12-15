<x-fardelli.layout class="bg-neutral-200">

    <div class="w-4/5 pt-10 m-auto">
        <h1 class="text-3xl text-bold border-slate-500 border-b-4 pb-4">Nuovo post</h1>
    </div>

    <div class="w-4/5 pt-5 md:pt-10 m-auto">

        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- TITOLO -->
            <x-fardelli.input name="title" nome="titolo" />

            <!-- DESCRIZIONE - opzionale -->
            <div class="mt-4 flex flex-col">
                <label for="excerpt" class="text-xl pb-2">DESCRIZIONE (opzionale)</label>
                <input name="excerpt" type="text" value="{{ old('excerpt') }}" class="rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- TESTO -->
            <x-fardelli.textarea name="body" nome="testo" />

            <!-- IMMAGINE -->
            <div class="mt-4 flex flex-col border-b-2 border-slate-500 pb-8">
                <label class="text-xl pb-2">IMMAGINE</label>
                <label>
                    <input type="file" name="image" class="text-sm text-grey-500 rounded-xl
                        file:mr-10 file:py-2 file:px-5
                        file:rounded-xl file:border-0 file:border-r-2 file:border-b-2 file:border-blue-900
                        file:text-sm file:font-medium
                        file:bg-blue-300 file:text-blue-700
                        hover:file:cursor-pointer hover:file:bg-blue-600
                        hover:file:text-slate-100" />
                </label>

                <div class="mt-6 flex flex-row md:gap-4 items-center">
                    <p class="text-lg">Se non ne hai puoi cercarne una su</p>
                    <a href="https://www.pexels.com/it-it/" target="_blank" class="">
                        <img class="w-24" src="https://images.pexels.com/lib/api/pexels.png" />
                    </a>
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="image_author" class="text-xl pb-2">DESCRIZIONE (opzionale)</label>
                    <input name="image_author" type="text" value="{{ old('image_author') }}" class="rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <!-- <x-fardelli.input name="image_author" nome="autore dell'immagine (opzionale)" /> -->

            </div>

            <!-- INVIA -->
            <button action="submit" class="my-8 text-lg font-medium bg-blue-300 text-blue-700 hover:bg-blue-600 hover:font-bold hover:text-slate-100 px-5 py-2 rounded-xl border-r-2 border-b-2 border-blue-900">
                Salva
            </button>

        </form>

        @if ($errors->any())
            <div class="w-4/5 m-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</x-fardelli.layout>