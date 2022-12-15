@props(['image_path'])

<!-- IMMAGINE -->
<!-- piccola anteprima e pulsante per cambiare eventualmente l'immagine -->
<div class="mt-4 flex flex-col border-b-2 border-slate-500 pb-8">
    <label class="text-xl pb-2">IMMAGINE</label>
    <!-- anteprima -->
    <img class="w-24" src="{{ $image_path }}" />

    <!-- pulsante -->
    <div class="" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
        <div @click="open = ! open">
            <p class="w-1/5 mt-4 my-8 text-lg font-medium bg-blue-300 text-blue-700 hover:bg-blue-600 hover:font-bold hover:text-slate-100 px-5 py-2 rounded-xl border-r-2 border-b-2 border-blue-900">Aggiorna l'immagine</p>
        </div>

        <div x-show="open" class="mt-2 w-2/3">

            <div class="">
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
            </div>
        </div>
    </div>

</div>