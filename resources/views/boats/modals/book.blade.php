<div x-data="{ showModal: false}">
    <button @click="showModal = true; modalData = {{ json_encode($boat) }}" type="button" class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Book</button>

    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-header py-3 px-4 flex justify-between">
                <h2 class="text-xl font-semibold">Book</h2>
                <button @click="showModal = false" class="modal-close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('boats.book') }}">>
                    @csrf

                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('First name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="Auth::user()->first_name" required autofocus autocomplete="first_name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Adults -->
                    <div class="mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-capacity">
                            Adults
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-capacity" name="adults">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
                        </div>
                    </div>

                    <!-- Children -->
                    <div class="mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-capacity">
                            Children
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-capacity" name="children">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
                        </div>
                    </div>

                    <!-- Babies -->
                    <div class="mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="grid-capacity">
                            Babies
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-capacity" name="babies">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
                        </div>
                    </div>

                    <!-- Total price -->
                    <div class="mt-4">
                        <x-input-label for="total_price" :value="__('Total price')" />
                        <x-text-input id="total_price" class="block mt-1 w-full" type="number" name="total_price" :value="old('total_price')" required autofocus autocomplete="total_price" />
                        <x-input-error :messages="$errors->get('total_price')" class="mt-2" />
                    </div>

                    <button type="submit" class="mt-6 w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
