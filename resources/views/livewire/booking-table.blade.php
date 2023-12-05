<div>
        <section class="mt-10">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex items-center justify-between d p-4">
                        <div class="flex">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                         fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input wire:model.live.debounce.300ms="search"
                                        type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                        placeholder="Search" required="">
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <div class="flex space-x-3 items-center">
                                <label class="w-40 text-sm font-medium text-gray-900">Tour :</label>
                                <select
                                    wire:model.live="tour"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="">All</option>
                                    <option value="Blue Cave">Blue Cave</option>
                                    <option value="Perast">Perast</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Tour name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Number of adults
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Number of kids
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Number of infants
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Total price
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Departure time
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Additional message
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Bookie
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Edit
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Cancel
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookings as $single_booking)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        {{$single_booking['tour']}}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{$single_booking['number_of_adults']}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$single_booking['number_of_kids']}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$single_booking['number_of_infants']}}
                                    </td>
                                    <td class="px-6 py-4 text-center" style="color: green">
                                        <div class="border border-white text-white bg-green-600 rounded-lg">
                                            {{$single_booking['total_price']}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$single_booking['departure_time']}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$single_booking['additional_message']}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{$single_booking['user']['full_name']}}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <a href="#" class="flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="#" class="flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="red" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select
                                    wire:model.live="perPage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        {{$bookings->links() }}
                    </div>
                </div>
            </div>
        </section>
</div>
