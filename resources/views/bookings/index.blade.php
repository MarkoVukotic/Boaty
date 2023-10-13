<x-app-layout>

    {{--    <x-slot name="header">--}}

    {{--    </x-slot>--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            </div>
        </div>
    </div>
</x-app-layout>
