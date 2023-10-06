<div x-data="{ showModal: false}">
    <button @click="showModal = true; modalData = {{ json_encode($boat) }}" type="button" class="w-full text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900 mr-2 mb-2">More info</button>
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-header py-3 px-4 flex justify-between">
                <h2 class="text-xl font-semibold">More information</h2>
                <button @click="showModal = false" class="modal-close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Owner: </span>{{$boat['user']['first_name'] . ' ' . $boat['user']['last_name']}}</p>
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Production year:</span> {{$boat['production_year']}}</p>
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Capacity: </span>{{$boat['capacity']}}</p>
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Blue Cave private price: </span>{{$boat['blue_cave_private']}}</p>
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Perast private price: </span>{{$boat['perast_private']}}</p>
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Blue Cave group price: </span>{{$boat['blue_cave_group']}}</p>
                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="text-xs">Price by hour: </span>{{$boat['price_by_hour']}}</p>
            </div>
            <div class="modal-footer py-3 px-4">


            </div>
        </div>
    </div>
</div>
