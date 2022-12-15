<x-fardelli.layout>

    <x-fardelli.navbar />

    <section class="border-4 border-violet-900 rounded-3xl mt-10 md:m-4 m-2 md:px-10 px-2 md:py-10 py-2 bg-violet-200">
        <!-- titolo -->
        <h1 class="text-4xl md:text-6xl font-bold pb-3 mb-4 md:mb-6 mt-6">{{ $post->title }}</h1>
        <!-- autore e data (di creazione o pubblicazione?) -->
        <a href="/posts/?author={{ $post->author->name }}" class="inline-block text-sm text-slate-700 pb-3">di {{ $post->author->name }}</a><span class="text-xs text-slate-500">
            &#8226; {{ $post->created_at->formatLocalized('%A %d %B %Y') }}</span>
        </div>
        <!-- immagine -->
        <div class="pb-5 text-xs place-items-center">
        @if ($post->image_path)
            <img class="md:max-w-screen-sm" src="{{ asset('img/posts/' . $post->image_path) }}" alt="Post image" />
        @else
            <img class="md:max-w-screen-sm" src="https://picsum.photos/500" alt="Post image" />
        @endif
            <!-- autore dell'immagine (opzionale) -->
            @if ($post->image_author)
                <span class="text-slate-500">foto di {{ $post->image_author }}</span>
            @endif
        <!-- excerpt (opzionale) -->
        @if ($post->excerpt)
            <h1 class="text-3xl pb-3 mt-10">{{ $post->excerpt }}</h1>
        @endif
        <!-- testo del post -->
        <p class="mb-4 mt-4 text-lg">{{ $post->body }}</p>
    </section>

    <!-- CONTROLLI solo per autore del post -->
    @if (Auth::check() && auth()->user()->name == $post->user->name)
        <section class="flex flex-row md:justify-start justify-around items-center gap-4 border-4 border-violet-900 rounded-3xl mt-10 md:m-10 m-2 md:px-4 px-2 md:py-4 py-2 bg-black">
            <div class="">
                <a href="/posts/{{ $post->slug }}/edit" class="h-1 p-2 text-lg text-white bg-blue-600 rounded-xl">Modifica</a>
            </div>
            <div class="">
                <form action="/posts/{{ $post->slug }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('delete')
                    <button class="p-2 text-lg text-white bg-red-600 rounded-xl">Cancella</button>
                </form>
            </div>
        </section>
    @endif

    <!-- COMMENTS -->
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border rounded-lg px-4 py-2 sm:px-6 sm:py-4">
        @csrf

        @auth()
            <h1 class="text-lg mb-4">Vuoi commentare?</h1>
            <div>
                <textarea
                    name="body"
                    id="body"
                    class="w-full text-sm rounded-lg outline-none focus:outline-none focus:ring bg-slate-100 text-slate-700"
                    placeholder="il tuo commento..."
                    required
                    ></textarea>

                @error('body')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

            </div>
            <div>
                <button type="submit" class="p-2 my-2 text-lg text-white bg-blue-500 hover:bg-blue-600 rounded-xl">Pubblica</button>
            </div>
        @else
            <p class="font-semibold">
                <a href="/register" class="hover:underline">Registrati</a> o <a href="/login" class="hover:underline">Accedi</a> per commentare.
            </p>
        @endauth

    </form>

    <section class="md:mt-8 mt-2 overflow-hidden flex items-center justify-center mb-10">
        <div class="md:mx-4 mx-2">
            <h3 class="mb-4 text-lg md:text-2xl font-semibold text-gray-900">Commenti</h3>
            <div class="space-y-4">
            @foreach ( $post->comments as $comment )

            @if ($comment->replies)
                {{-- <p>{{ $comment->replies->parent_id }}</p> --}}
                <p>{{ $comment->replies }}</p>
            @endif

                <x-fardelli.comment :comment="$comment" :post="$post"/>
            @endforeach
        </div>
    </section>

</x-fardelli.layout>