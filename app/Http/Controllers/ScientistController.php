<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScientistCollection;
use App\Http\Resources\ScientistResource;
use App\Models\scientist;
use Illuminate\Http\Request;

class ScientistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scientists = scientist::all();
        return new ScientistCollection($scientists);
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
        Scientist::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\scientist  $scientist
     * @return \Illuminate\Http\Response
     */
    public function show(scientist $scientist)
    {
        return new ScientistResource($scientist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\scientist  $scientist
     * @return \Illuminate\Http\Response
     */
    public function edit(scientist $scientist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\scientist  $scientist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $scientist_id)
    {
        $scientist = Scientist::find($scientist_id);
        if(is_null($scientist)){
            return response()->json('Scientist with given id does not exist!', 404);
        }
        $scientist->update($request->all());
        return response()->json('Scientist successfully updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\scientist  $scientist
     * @return \Illuminate\Http\Response
     */
    public function destroy($scientist_id)
    {
        $scientist = Scientist::find($scientist_id);
        if (is_null($scientist)) {
            return response()->json('Scientist with given id does not exist!', 404);
        }
        $scientist->delete();
        return response()->json('Scientist successfully deleted',200);
    }
}
