@props(['comment', 'post'])

<div class="flex">
    <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://i.pravatar.cc/200" alt="">
    </div>
    <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
        <strong>{{ $comment->author->name }}</strong> <span class="text-xs text-gray-400">&#8226; {{ $comment->created_at->formatLocalized('%A %d %B %Y') }}</span>
        <p class="text-sm">{{ $comment->body}}</p>

        <!-- repliche -->
        <div class="mt-4 flex items-center">
            <div class="flex -space-x-2 mr-2">
                <img class="rounded-full w-6 h-6 border border-white" src="https://i.pravatar.cc/100" alt="">
                <img class="rounded-full w-6 h-6 border border-white" src="https://i.pravatar.cc/100" alt="">
            </div>
{{--            <div class="text-sm text-gray-500 font-semibold">
                {{ $comment->replies->count() }} repliche
            </div> --}}
        </div>

        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border rounded-lg px-4 py-2 sm:px-6 sm:py-4">
            @csrf
            @auth()
            <h1 class="text-lg mb-4">Vuoi rispondere?</h1>
            <div>
                <textarea name="body" id="body" class="w-full text-sm rounded-lg outline-none focus:outline-none focus:ring bg-slate-100 text-slate-700" placeholder="la tua risposta..." required></textarea>

                @error('body')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

            </div>
            <div>
                <button type="submit" class="p-2 my-2 text-lg text-white bg-blue-500 hover:bg-blue-600 rounded-xl">Pubblica</button>
            </div>
            @endauth
        </form>
        <!-- Se ci sono repliche -->
        @foreach ( $comment->replies as $replie )
            {{-- <x-fardelli.replies :comment="$replie" :post="$post"></x-fardelli.replies> --}}
            <x-fardelli.comment :comment="$replie" :post="$post"></x-fardelli.comment>
        @endforeach

    </div>
</div>