<?php

namespace App\Http\Controllers;

use App\Http\Resources\StarCollection;
use App\Http\Resources\StarResource;
use App\Models\star;
use Illuminate\Http\Request;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::all();
        return new StarCollection($stars);
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
        Star::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\star  $star
     * @return \Illuminate\Http\Response
     */
    public function show(star $star)
    {

        return new StarResource($star);

        // $star = Star::find($star_id);
        // if(is_null($star)){
        //     return response()->json('Data not found',404);
        // }
        // return response()->json($star);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\star  $star
     * @return \Illuminate\Http\Response
     */
    public function edit(star $star)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\star  $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $star_id)
    {
        $star = Star::find($star_id);
        if(is_null($star)){
            return response()->json('Star with given id does not exist!',404);
        }
        $star->update($request->all());
        return response()->json('Star is updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(star $star)
    {
        $star->delete();
        return response()->json('Star is deleted successfully',200);
    }
}
