<x-app-layout>
    <x-self.base>
        <h1 class="text-xl text-center text-slate-700 font-bold mb-5"> -- ETIQUETAS -- </h1>

        <div class="w-2/3 m-auto relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-slate-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-slate-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item -> name}}
                        </th>
                        <td class="px-6 py-4">
                            <div class="rounded-xl p-1 font-bold text-xs text-center text-white" style="background-color: {{$item -> color}};">
                                {{$item -> color}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{$item -> description}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-self.base>
</x-app-layout>