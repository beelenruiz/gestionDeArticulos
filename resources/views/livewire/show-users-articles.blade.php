<div>
    <h1 class="pt-12 text-xl text-center text-slate-700 font-bold mb-5"> -- TUS ARTÍCULOS -- </h1>
    <div class="flex m-auto w-3/4 items-center mb-2 justify-between">
        <form class="w-1/4">
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                <div class="relative w-full">
                    <x-input wire:model.live="buscar" type="search" id="search-dropdown" class="rounded-lg block p-2 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Buscar..." required />
                    <button type="submit" class="absolute top-0 end-0 p-2 text-sm font-medium h-full text-white bg-slate-600 rounded-e-lg hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-700">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span class="sr-only">Buscar</span>
                    </button>
                </div>
            </div>
        </form>

        <div>
            @livewire('create-articles')
        </div>
    </div>
    @if($articles -> count())
    <div class="w-3/4 m-auto relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-slate-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Nombre
                            <a href="#" wire:click="ordenar('titulo')"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contenido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Etiqueta
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Accciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-slate-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item -> title}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item -> content}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="rounded-xl p-1 font-bold text-xs text-center text-white" style="background-color: {{$item -> color}};">
                            {{$item -> name}}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div>
                            <button wire:click="delete({{$item -> id}})" class="mr-3 font-medium text-red-700/90 dark:text-blue-500 hover:underline">
                                Delete
                            </button>
                            <button wire:click="edit({{$item -> id}})" class="font-medium text-blue-700/90 dark:text-blue-500 hover:underline">
                                Edit
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{$articles->links()}}
    </div>
    @else
    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            No se ha entontrado nungún articulo, o aún no has creado ninguno.
        </div>
    </div>
    @endif

    <!-- ----------------- editar --------------------------- -->

    @isset($uform -> article)
    <x-dialog-modal wire:model="openUpdate">
        <x-slot name="title">
            EDITAR ARTÍCULO
        </x-slot>

        <x-slot name="content">
            <div class="mb-6">
                <label for="title" class="block text-medium font-medium text-gray-700 mb-2">Título</label>
                <input type="text" wire:model="uform.title"
                    id="title" name="title" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700" placeholder="Escribe el título...">
                <x-input-error for="uform.title" />
            </div>

            <div class="mb-6">
                <label for="content" class="block text-medium font-medium text-gray-700 mb-2">Contenido</label>
                <textarea wire:model="uform.content"
                    id="content" name="content" rows="6" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700" placeholder="Escribe el contenido..."></textarea>
                <x-input-error for="uform.content" />
            </div>

            <div class="mb-6">
                <label for="tag" class="block text-lg font-medium text-gray-700 mb-2">Etiqueta</label>
                <select id="tag" wire:model="uform.tag_id" name="tag" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700">
                  <option selected>Seleccionar etiqueta</option>
                  @foreach($tags as $item)
                  <option value="{{$item->id}}">{{$item -> name}}</option>
                  @endforeach
                </select>
                <x-input-error for="uform.tag_id" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse justify-center">
                <button wire:click="update" wire:loading.attr="disabled" class="ml-2 p-2 bg-slate-700/60 text-white font-semibold rounded-lg shadow-md hover:bg-slate-700 transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Aceptar
                </button>
                <button wire:click="cancelar" class="p-2 bg-red-900/60 text-white font-semibold rounded-lg shadow-md hover:bg-red-900 transition duration-300">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
    @endisset

</div>