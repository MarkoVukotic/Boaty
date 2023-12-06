<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class BookingTable extends Component
{
    public int $perPage = 5;
    public string $search = '';
    public string $tour = '';

    public $sort_by = 'departure_time';
    public $sort_direction = 'DESC';

    public function delete(Booking $booking)
    {
        $booking->delete();
    }

    public function setSortBy($sortByField)
    {
        if($this->sort_by === $sortByField){
            $this->sort_direction = ($this->sort_direction === 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sort_by = $sortByField;
        $this->sort_direction = 'DESC';
    }

    public function render()
    {
        $bookings = Booking::select('*')
            ->with('user')
            ->when($this->tour !== '', function ($query) {
                $query->where('tour', $this->tour);
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.booking-table', ['bookings' => $bookings]);
    }
}
