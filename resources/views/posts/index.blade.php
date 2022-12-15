<x-fardelli.layout class="bg-violet-100">

    <x-fardelli.navbar />

    <div class="container mx-auto p-4">

        <x-fardelli.title title="NewS"></x-fardelli.title>

        @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="fixed bg-blue-500 text-white px-2 py-4 rounded-xl bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
        @endif


        <div class="grid lg:grid-cols-3 gap-2 mt-20">

            @foreach ($posts as $post)
                @if ($post->status=='published')
                <div class="lg:px-6 px-2 lg:py-10 py-2 bg-violet-200 rounded-xl border-4 border-violet-900">
                    <h1 class="text-5xl pb-3">{{ $post->title }}</h1>

                    <a href="/posts/?author={{ $post->author->name }}" class="inline-block text-sm text-slate-700 pb-3">di
                        {{ $post->author->name }}</a><span class="text-xs text-slate-500">
                        &#8226; {{ $post->created_at->formatLocalized('%A %d %B %Y') }}</span>

                    <div class="pb-5 text-xs">
                        @if ($post->image_path)
                        <img class="" src="{{ asset('img/posts/' . $post->image_path) }}" alt="Post image" />
                        @else
                        <img class="" src="https://picsum.photos/400/300?random={{ $loop->index }}" alt="Post image" />
                        @endif
                        <!-- <img class="" src="{{ asset('img/posts/' . $post->image_path) }}" alt="post image" /> -->
                        <!--  se c'è l'autore dell'immagine... -->
                        @if ($post->image_author)
                            <span class="text-slate-500">foto di {{ $post->image_author }}</span>
                        @endif
                    </div>
                    <!-- excerpt (opzionale) -->
                    @if ($post->excerpt)
                        <h1 class="text-3xl pb-3">{{ $post->excerpt }}</h1>
                    @endif
                    <p class="mb-4 text-lg">{!! Str::limit($post->body, 200) !!}</p>
                    <div class="flex justify-end">
                        <a href='/posts/{{ $post->slug }}' class="border-4 border-violet-900 bg-violet-400 px-2 rounded-xl text-slate-100">LEGGI TUTTO</a>
                    </div>
                </div>
                @endif
            @endforeach

        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>

</x-fardelli.layout>