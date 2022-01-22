<?php

namespace App\Http\Controllers;

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
        return $stars;
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
        //
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
    public function update(Request $request, star $star)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(star $star)
    {
        //
    }
}
