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
