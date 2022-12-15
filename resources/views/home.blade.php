<x-fardelli.layout>

    <div class="bg-violet-900">

        <x-fardelli.navbar />

        <x-fardelli.flash />

        <x-fardelli.banner />

        <section class="px-6 py-4 bg-white">

            <div class="pt-10 md:pt-20 pb-20 text-xl text-center">
                <p>Saremo noi a portare il vostro peso.</p>
                <p>Siamo ciò che siamo e vogliamo più di quel che abbiamo.</p>
                <p>Saremo presenti quando altri saranno assenti.</p>
                <br />
                <p>La rivoluzione comincia dal basso,</p>
                <p>la reazione proviene dall'alto,</p>
                <p>la virtù sta nel mezzo.</p>
                <br />
                <p>Noi ci poniamo in verticale,</p>
                <p>attraversando tutto, vedendo tutto.</p>
                <br />
                <p>Noi viviamo in orizzontale,</p>
                <p>sentendo le persone ai lati.</p>
                <br />
                <p>Saremo quello che vorremo.</p>
            </div>

            <video class="m-auto w-5/6 md:w-3/5 outline center aspect-video"
                src="{{ asset('videos/Fardelli-spot2.mp4') }}"
                controls
            >
            </video>

            <!-- <iframe class="m-auto w-5/6 md:w-3/5 center aspect-video"
                src="{{ url('https://www.youtube.com/embed/DqtQJaNftFQ') }}"
                frameborder="0"
                allowfullscreen>
            </iframe> -->

        </section>

    </div>

    <div id="footer">
        <x-fardelli.footer />
    </div>

</x-fardelli.layout>