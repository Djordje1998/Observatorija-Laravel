<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScientistCollection;
use App\Http\Resources\ScientistResource;
use App\Models\scientist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|string|max:50|min:8|email|unique:scientists',
            'password' => 'required|string|max:50|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => "" . $validator->errors()]);
        }

        try {
            $scientist = Scientist::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return response()->json(['success' => true, 'message' => 'Scientist is created successfully.', 'scientist' => new ScientistResource($scientist)]);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|string|max:50|min:8|email|unique:scientists',
            'password' => 'required|string|max:50|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $scientist = Scientist::find($scientist_id);
        if (is_null($scientist)) {
            return response()->json('Scientist with given id does not exist!', 404);
        }

        $scientist->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['Scientist is created successfully.', new ScientistResource($scientist)]);
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
            return response()->json(['success' => false, 'message' => 'Scientist with given id does not exist!'], 404);
        }
        
        try {
            $scientist->delete();
            return response()->json(['success' => true, 'message' => 'Scientist successfully deleted'], 200);
        } catch (Exception $ex) {
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
}
