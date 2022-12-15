<p class="text-xl pb-2 mb-10 border-b-2 border-slate-500">I TUOI POSTS</p>

<div class="grid md:grid-cols-2 gap-4">

    @foreach (auth()->user()->posts as $post)

    <div class="">

        <a href="/posts/{{ $post->slug }}" class="text-lg border-b border-slate-600 hover:text-blue-700">
            <span>{{ $loop->iteration }} - </span>
            {{ $post->title }}
        </a>

        <div class="mt-2">

            <?php $status=$post->status ?>
            @if ($status=='published')
                <p>stato: <span class="text-center px-2 bg-green-300 md:w-1/3">pubblicato</span></p>
            @elseif ($status=='deleted')
                <p>stato: <span class="text-center px-2 bg-red-500 md:w-1/3">cancellato</span></p>
            @endif

        </div>

    </div>

    @endforeach
</div>