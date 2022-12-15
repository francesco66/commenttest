<x-fardelli.layout class="bg-neutral-200">

    <div class="w-4/5 pt-10 m-auto">
        <h1 class="text-3xl text-bold border-slate-500 border-b-4 pb-4">Modifica post</h1>
    </div>

    <div class="w-4/5 pt-5 md:pt-10 m-auto">

        <form action="/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- TITOLO -->
            <div class="mt-4 flex flex-col">
                <label for="title" class="text-xl pb-2">TITOLO</label>
                <input name="title" type="text" value="{{ $post->title }}" class="rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- DESCRIZIONE - opzionale -->
            <div class="mt-4 flex flex-col">
                <label for="excerpt" class="text-xl pb-2">DESCRIZIONE (opzionale)</label>
                <input name="excerpt" type="text" value="{{ $post->excerpt }}" class="rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <!-- TESTO -->
            <div class="mt-4 flex flex-col">
                <label for="body" class="text-xl pb-2">TESTO</label>
                <textarea id="body" name="body" required class="h-80 rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $post->body }}</textarea>
            </div>

            <!-- IMMAGINE -->
            <x-fardelli.uploadimage image_path="{{ asset('/img/posts/' . $post->image_path) }}" />


            <!-- INVIA -->
            <button action="submit" class="my-8 text-lg font-medium bg-blue-300 text-blue-700 hover:bg-blue-600 hover:font-bold hover:text-slate-100 px-5 py-2 rounded-xl border-r-2 border-b-2 border-blue-900">
                Salva
            </button>

        </form>

    </div>

</x-fardelli.layout>