<x-app-layout>
    <x-self.base>
        <div class="rounded-xl shadow w-1/2 m-auto p-5">
        <h1 class="text-xl text-center text-slate-700 font-bold mb-5"> EDITAR ETIQUETA </h1>

        <form action="{{route('tags.update', $tag)}}" method="POST">
        @csrf
        @method('PUT')
            <div class="mb-6">
                <label for="name" class="block text-medium font-medium text-gray-700 mb-2">Nombre</label>
                <input type="text" value="{{old('name', $tag -> name)}}"
                    id="name" name="name" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700" placeholder="Escribe el nombre...">
                <x-input-error for="name" />
            </div>

            <div class="mb-6">
                <label for="description" class="block text-medium font-medium text-gray-700 mb-2">Descripción</label>
                <textarea 
                    id="description" name="description" rows="3" class="w-full p-2 text-medium rounded-lg focus:ring-slate-700 focus:border-slate-700" placeholder="Escribe una descripción...">{{old('description', $tag -> description)}}</textarea>
                <x-input-error for="description" />
            </div>

            <div class="mb-6">
                <label for="color" class="block text-medium font-medium text-gray-700 mb-2">Etiqueta</label>
                <input value="{{old('color', $tag -> color)}}" type="color" name="color" id="color" class="w-full p-1 h-10 text-medium rounded-lg focus:ring-slate-700 border-slate-700"/>
                <x-input-error for="color" />
            </div>

            <div class="flex w-full justify-end">
                <button type="submit" class="ml-2 p-2 bg-slate-700/60 text-white font-semibold rounded-lg shadow-md hover:bg-slate-700 transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Aceptar
                </button>
                <a href="{{route('tags.index')}}" class="ml-3 p-2 bg-red-900/60 text-white font-semibold rounded-lg shadow-md hover:bg-red-900 transition duration-300">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </a>
            </div>
        </form>
        </div>
    </x-self.base>
</x-app-layout>