<?php

namespace App\Http\Controllers;

use App\Http\Resources\StarCollection;
use App\Http\Resources\StarResource;
use App\Models\star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'system' => 'required|string|max:50|min:3',
            'spectral' => 'required|string|max:50|min:3',
            'size' => 'required|string|max:50|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $star = Star::create($request->all());
        return response()->json(['Star is created successfully.', new StarResource($star)]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'system' => 'required|string|max:50|min:3',
            'spectral' => 'required|string|max:50|min:3',
            'size' => 'required|string|max:50|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $star = Star::find($star_id);
        if (is_null($star)) {
            return response()->json('Star with given id does not exist!', 404);
        }
        $star->update($request->all());
        return response()->json(['Star is updated successfully.', new StarResource($star)]);
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
        return response()->json('Star is deleted successfully', 200);
    }
}
