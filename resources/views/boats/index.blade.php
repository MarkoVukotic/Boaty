<x-app-layout>

    <x-slot name="header">

        <a href="{{route('boats.create')}}">
            <button type="button"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Add boat
            </button>
        </a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg
            flex justify-around items-center space-x-10">


                @foreach ($boats as $boat)
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="text-center mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$boat['model']}}</h5>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Production year:</span> {{$boat['production_year']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Capacity: </span>{{$boat['capacity']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Blue Cave private price: </span>{{$boat['blue_cave_private']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Perast private price: </span>{{$boat['perast_private']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Blue Cave group price: </span>{{$boat['blue_cave_group']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Price by hour: </span>{{$boat['price_by_hour']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
