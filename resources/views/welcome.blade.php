<x-app-layout>
    <x-self.base>
        <div class="flex flex-wrap gap-4 justify-center">
            @foreach ($articles as $item)
            <div class="max-w-sm p-6 bg-slate-300 border border-gray-200 rounded-2xl shadow-md dark:bg-gray-800 dark:border-gray-700">

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="mb-4">
                        <span class="px-3 py-1 text-sm font-semibold text-white rounded-full" style="background-color: {{$item -> tag -> color}};">
                            {{ $item -> tag -> name}}
                        </span>
                    </div>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$item -> title}}</h5>
                    <p class="mb-3 h-30 font-normal text-gray-700 dark:text-gray-400">
                        {{$item -> content}}
                    </p>
                    <div class="mt-4 flex items-center">
                        <img class="w-10 h-10 rounded-full object-cover" src="" alt="User Avatar">
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $item->user->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
        <div class="mt-1">
            {{$articles -> links()}}
        </div>
    </x-self.base>
</x-app-layout>