<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class BookingTable extends Component
{
    public int $perPage = 5;
    public string $search = '';
    public string $tour = '';

    public function delete(Booking $booking)
    {
        $booking->delete();
    }
    public function render()
    {
        $bookings = Booking::select('*')
            ->orderBy('created_at', 'asc')
            ->orderBy('departure_time', 'asc')
            ->with('user')
            ->when($this->tour !== '', function($query){
                $query->where('tour', $this->tour);
            })
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.booking-table', ['bookings' => $bookings]);
    }
}
