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
            <div class="flex gap-2 justify-end">
                <div>
                    <select id="tour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 text-center
                    focus:border-blue-500 block w-44 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                        <option selected>Choose the tour</option>
                        <option value="09:00">Blue cave</option>
                        <option value="12:00">Blue cave private</option>
                        <option value="15:00">Perast</option>
                        <option value="18:00">Perast private</option>
                    </select>
                </div>
                <div>
                    <select id="departure_time_filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 text-center
                    focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                    dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
                        <option selected>Departure time</option>
                        <option value="09:00">09:00</option>
                        <option value="12:00">12:00</option>
                        <option value="15:00">15:00</option>
                        <option value="18:00">18:00</option>
                    </select>
                </div>
                <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100
                        focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800
                        dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                >Filter</button>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg
            flex justify-around items-center space-x-10">


                @foreach ($boats as $boat)
                    <div x-data="{ showModal: false, modalData: {} }"
                        class="m-4 flex flex-col items-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="text-center mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$boat['model']}}</h5>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Tour: </span>{{$boat['tour']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Capacity: </span>{{$boat['capacity']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Booked capacity: </span>{{$boat['booked_capacity']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Departure time : </span>{{$boat['departure_time']}}</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                            <div class="bg-green-600 h-2.5 rounded-full dark:bg-green-500" style="width:{{$boat['booked_capacity'] / $boat['capacity'] * 100}}%"></div>
                        </div>
                        <div class="mt-4 flex justify-around items-center space-x-4">
                            @include('boats.modals.book')
                            @include('boats.modals.more_info')
                        </div>

                    </div>
                @endforeach
    </div>
        </div>
    </div>
</x-app-layout>
