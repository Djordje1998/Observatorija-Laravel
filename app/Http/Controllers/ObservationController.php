<?php

namespace App\Http\Controllers;

use App\Http\Resources\ObservationCollection;
use App\Http\Resources\ObservationResource;
use App\Models\observation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[
            'scientist_id' => 'required|integer',
            'star_id' => 'required|integer',
            'cognition' => 'required|string|max:255|min:20',
            'new_star' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $observation = Observation::create($request->all());
        return response()->json(['Observation is created successfully.',new ObservationResource($observation)]);
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
        try {
            Observation::where([
                ['scientist_id', $request->scientist_id],
                ['star_id', $request->star_id]
            ])->delete();
            return response()->json(['success'=>true,'message'=>'Observation is deleted successfully']);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
}
