<?php

namespace App\Http\Controllers;

use App\Models\ThesisType;
use App\Http\Requests\StoreThesisTypeRequest;
use App\Http\Requests\UpdateThesisTypeRequest;
use Illuminate\Http\Request;

class ThesisTypeController extends Controller
{
    public function get_thesis_type()
    {
        $data = ThesisType::get();
        return response()->json(['success' => 1, 'data' => $data], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_thesis(Request $request)
    {
        $data = (object)$request->json()->all();

        $thesisType = new ThesisType();
        $thesisType->name = $data->name;
        $thesisType->save();

        return response()->json(['success' => 1, 'data' => $thesisType], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_thesis_type(Request $request)
    {
        $data = (object)$request->json()->all();

        $thesisType = ThesisType::find($data->id);
        $thesisType->name = $data->name;
        $thesisType->update();

        return response()->json(['success' => 1, 'data' => $thesisType], 200, [], JSON_NUMERIC_CHECK);

    }

    public function delete_thesis_type($id)
    {
        $thesisType = ThesisType::find($id);
        $thesisType->delete();

        return response()->json(['success' => 1, 'data' => $thesisType], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ThesisType $thesisType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThesisTypeRequest $request, ThesisType $thesisType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThesisType $thesisType)
    {
        //
    }
}
