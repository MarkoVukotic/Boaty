<?php

namespace App\Http\Controllers;

use App\Models\Boats;
use App\Http\Requests\StoreBoatsRequest;
use App\Http\Requests\UpdateBoatsRequest;

class BoatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $boats = Boats::where('availability', true)
                ->with('user')
                ->orderBy('id', 'desc')
                ->get()->toArray();

            return view('boats.index', compact('boats'));

        }catch (\Exception $e){
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
        return view('boats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBoatsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoatsRequest $request)
    {
        try {
            $validated_data = $request->validated();
            $validated_data['user_id'] = auth()->user()->id;

            Boats::create($validated_data);

            return redirect('boats');

        }catch (\Exception $e){
            echo $e->getMessage();
            echo $e->getLine();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boats  $boats
     * @return \Illuminate\Http\Response
     */
    public function show(Boats $boats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boats  $boats
     * @return \Illuminate\Http\Response
     */
    public function edit(Boats $boats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBoatsRequest  $request
     * @param  \App\Models\Boats  $boats
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoatsRequest $request, Boats $boats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boats  $boats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boats $boats)
    {




        //
    }
}
