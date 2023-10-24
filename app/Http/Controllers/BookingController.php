<?php

namespace App\Http\Controllers;

use App\Models\Boats;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{

    private int $booked_capacity;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            //TODO Moram ovdje da napravim da vraca i samo po danasnjem datumu i nadalje, ali da mu je prioritet danasnji datum
            $bookings = Booking::select('*')
                ->orderBy('created_at', 'asc')
                ->orderBy('departure_time', 'asc')
                ->with('user')
                ->get()->toArray();

            return view('bookings.index', compact('bookings'));

        } catch (\Exception $e) {
            echo $e->getMessage();
            echo $e->getLine();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBookingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $warning = $this->checkBoatCapacity($data);

            if ($warning) {
                Alert::warning('Unsuccessful', 'Your booking is not valid, due to safety guidelines');
            } else {
                Booking::create([
                    'tour' => $data['tour'],
                    'number_of_adults' => $data['number_of_adults'],
                    'number_of_kids' => $data['number_of_kids'],
                    'number_of_infants' => $data['number_of_infants'],
                    'total_price' => $data['total_price'],
                    'departure_time' => $data['departure_time'],
                    'user_id' => $data['user_id'],
                    'boats_id' => $data['boats_id'],
                    'additional_message' => $data['additional_message'],
                ]);

                $this->updateBoatCapacity($data);

                DB::commit();
            }
            return redirect('booking');
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            echo $e->getLine();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookingRequest $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    private function updateBoatCapacity($data)
    {
        $boat = $this->getBoat($data);
        $this->updateCapacity($boat);
    }

    private function getBoat($data)
    {
        return Boats::select('*')
            ->where('id', $data['boats_id'])
            ->where('departure_time', $data['departure_time'])
            ->first();
    }

    private function updateCapacity($boat)
    {
        $total_capacity = $boat['booked_capacity'] + $this->booked_capacity;

        $boat->update([
            'booked_capacity' => $total_capacity
        ]);

        Alert::success('Success', 'Your booking has been successfully registered');
    }

    private function checkBoatCapacity($data)
    {
        $boat = $this->getBoat($data);
        $this->booked_capacity = $data['number_of_infants'] + $data['number_of_kids'] + $data['number_of_adults'];

        $available_capacity = $boat['capacity'] - $boat['booked_capacity'];

        return $this->booked_capacity >= $available_capacity;

    }
}
