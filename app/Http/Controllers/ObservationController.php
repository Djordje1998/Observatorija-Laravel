<?php

namespace App\Http\Controllers;

use App\Http\Resources\ObservationCollection;
use App\Http\Resources\ObservationResource;
use App\Models\observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $observations = Observation::all();
        return new ObservationCollection($observations);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Observation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function show(observation $observation)
    {
        return new ObservationResource($observation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function edit(observation $observation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, observation $observation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $observation = Observation::where([
            ['scientist_id', $request->scientist_id],
            ['star_id', $request->star_id]
        ])->delete();
        if (is_null($observation)) {
            return response()->json('Observation with given id does not exist!',404);
        }
        return response()->json('Observation is deleted successfully',200);
    }
}
