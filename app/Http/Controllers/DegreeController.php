<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function get_degree()
    {
        $degree = Degree::get();
        return response()->json(['success' => 1, 'data' => $degree], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_degree(Request $request)
    {
        $data = (object)$request->json()->all();
        $degree = new Degree();
        $degree->name = $data->name;
        $degree->save();

        return response()->json(['success' => 1, 'data' => $degree], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_degree(Request $request)
    {
        $degree = Degree::find($request->id);
        $degree->name = $request->name;
        $degree->update();

        return response()->json(['success' => 1, 'data' => $degree], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_degree($id)
    {
        $degree = Degree::find($id);
        $degree->delete();
        return response()->json(['success' => 1, 'data' => $degree], 200, [], JSON_NUMERIC_CHECK);
    }
}
