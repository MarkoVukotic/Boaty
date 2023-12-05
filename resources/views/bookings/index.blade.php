<x-app-layout>
    @include('sweetalert::alert')

    {{--    <x-slot name="header">--}}

    {{--    </x-slot>--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @livewire('booking-table')
        </div>
    </div>
</x-app-layout>
