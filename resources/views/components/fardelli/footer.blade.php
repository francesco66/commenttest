<footer class="bg-violet-300 text-gray-600 mt-10 md:mb-6 rounded-3xl md:mx-6">

    <div class="md:mx-6 py-10 px-2">

        <div class="grid grid-1 md:grid-cols-2 gap-8">
            <!-- sx -->
            <div id='contacts' class="bg-slate-100 border border-violet-600 rounded-3xl text-center py-1 px-1 md:py-8 md:px-8 shadow-md">
                <h5 class="pt-2 text-3xl text-gray-600">FARDELLI D'ITALIA</h5>
                <div class="mt-6">
                    <p class="flex justify-center space-x-10">
                        <a href="https://www.facebook.com/movimentofardelliditalia" class="text-blue-600 border rounded-xl border-slate-300 px-4 py-2 hover:bg-indigo-200 hover:border-indigo-300">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="w-3" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                </path>
                            </svg>
                        </a>
                        <a href="mailto:info@fardelliditalia.eu" class="text-gray-700 border rounded-xl border-slate-300 px-3 py-2 hover:bg-indigo-200 hover:border-indigo-300">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="w-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                </path>
                            </svg>
                        </a>
                    </p>
                </div>
            </div>

            <!-- dx -->
            <div class="">
                <div id='newsletter' class="bg-violet-400 border border-black border-opacity-5 rounded-3xl text-center py-8 px-8 shadow-md">

                    <h5 class="pt-2 text-3xl text-gray-700">Iscriviti alla nostra newsletter</h5>
                    <x-fardelli.flash />

                    @error('email')
                        <span class="text-lg text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="mt-6">
                        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                            <form method="POST" action="/newsletter" class="lg:flex text-sm">
                                @csrf
                                <div class="lg:py-3 lg:px-5 flex items-center">
                                    <label for="email" class="hidden lg:inline-block">
                                        <img class="lg:pr-2" src="./img/mailbox-icon.svg" alt="mailbox letter">
                                    </label>
                                    <input name="email" type="text" placeholder="Indirizzo email" class="lg:bg-transparent py-2 lg:py-0 pl-2 border-none focus:border-none">
                                </div>

                                <button type="submit" class="transition-colors duration-300 bg-violet-500 hover:bg-violet-600 mt-4 lg:mt-0 lg:ml-3 rounded-3xl lg:rounded-r-full text-sm tracking-wide font-semibold text-white uppercase py-3 px-8">
                                    Iscriviti
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>