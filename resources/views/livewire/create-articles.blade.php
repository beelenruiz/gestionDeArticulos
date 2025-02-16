<div>
    <x-button class="font-bold" wire:click="$set('openCreate', true)"><i class="fas fa-add mr-2"></i>nuevo artículo</x-button>

    <x-dialog-modal wire:model="openCreate">
        <x-slot name="title">
            NUEVO ARTÍCULO
        </x-slot>

        <x-slot name="content">
            <div class="mb-6">
                <label for="title" class="block text-medium font-medium text-gray-700 mb-2">Título</label>
                <input type="text" wire:model="cform.title"
                    id="title" name="title" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700" placeholder="Escribe el título...">
                <x-input-error for="cform.title" />
            </div>

            <div class="mb-6">
                <label for="content" class="block text-medium font-medium text-gray-700 mb-2">Contenido</label>
                <textarea wire:model="cform.content"
                    id="content" name="content" rows="6" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700" placeholder="Escribe el contenido..."></textarea>
                <x-input-error for="cform.content" />
            </div>

            <div class="mb-6">
                <label for="tag" class="block text-lg font-medium text-gray-700 mb-2">Etiqueta</label>
                <select id="tag" wire:model="cform.tag_id" name="tag" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700">
                  <option selected>Seleccionar etiqueta</option>
                  @foreach($tags as $item)
                  <option value="{{$item->id}}">{{$item -> name}}</option>
                  @endforeach
                </select>
                <x-input-error for="cform.tag_id" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse justify-center">
                <button wire:click="store" wire:loading.attr="disabled" class="ml-2 p-2 bg-slate-700/60 text-white font-semibold rounded-lg shadow-md hover:bg-slate-700 transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Aceptar
                </button>
                <button wire:click="cancelar" class="p-2 bg-red-900/60 text-white font-semibold rounded-lg shadow-md hover:bg-red-900 transition duration-300">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
