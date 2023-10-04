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
                    <div x-data="{ showModal: false, modalData: {} }"
                        class="flex flex-col items-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="text-center mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$boat['model']}}</h5>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Production year:</span> {{$boat['production_year']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Capacity: </span>{{$boat['capacity']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Blue Cave private price: </span>{{$boat['blue_cave_private']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Perast private price: </span>{{$boat['perast_private']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Blue Cave group price: </span>{{$boat['blue_cave_group']}}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Price by hour: </span>{{$boat['price_by_hour']}}</p>

                        <div class="mt-4 flex justify-around items-center space-x-4">
                            <div x-data="{ showModal: false}">
                                <button @click="showModal = true; modalData = {{ json_encode($boat) }}" type="button" class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Book</button>

                                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
                                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                        <div class="modal-header py-3 px-4">
                                            <h2 class="text-xl font-semibold">Modal Title</h2>
                                            <button @click="showModal = false" class="modal-close">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <p x-text="modalData.production_year"></p>
                                            <p>@{{ modalData['production_year'] }}</p>
                                        </div>
                                        <div class="modal-footer py-3 px-4">
                                            <button @click="showModal = false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div x-data="{ showModal: false}">
                                <button @click="showModal = true; modalData = {{ json_encode($boat) }}" type="button" class="w-full text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 mr-2 mb-2">More info</button>
                                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
                                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                        <div class="modal-header py-3 px-4">
                                            <h2 class="text-xl font-semibold">Modal Title</h2>
                                            <button @click="showModal = false" class="modal-close">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <p x-text="modalData.production_year"></p>
                                            <p>@{{ modalData['production_year'] }}</p>
                                        </div>
                                        <div class="modal-footer py-3 px-4">
                                            <button @click="showModal = false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

                
    </div>
        </div>
    </div>
</x-app-layout>
