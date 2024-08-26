<?php

namespace App\Http\Controllers;

use App\Models\Synopsis;
use App\Http\Requests\StoreSynopsisRequest;
use App\Http\Requests\UpdateSynopsisRequest;
use Illuminate\Http\Request;

class SynopsisController extends Controller
{

    public function get_synopsis(){
        $data = Synopsis::get();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_synopsis(Request $request)
    {

        $data = (object)$request->json()->all();

        $synopsis = new Synopsis();
        $synopsis->name = $data->name;
        $synopsis->save();

        return response()->json(['success' => 1, 'data' => $synopsis], 200, [], JSON_NUMERIC_CHECK);
    }


    public function update_synopsis(Request $request)
    {
        $data = (object)$request->json()->all();

        $synopsis = Synopsis::find($data->id);
        $synopsis->name = $data->name;
        $synopsis->update();

        return response()->json(['success' => 1, 'data' => $synopsis], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_synopsis($id)
    {
        $synopsis = Synopsis::find($id);
        $synopsis->delete();

        return response()->json(['success' => 1, 'data' => $synopsis], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Synopsis $synopsis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Synopsis $synopsis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSynopsisRequest $request, Synopsis $synopsis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Synopsis $synopsis)
    {
        //
    }
}
