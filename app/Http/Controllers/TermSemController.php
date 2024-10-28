<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermSemester;


class TermSemController extends Controller
{
    public function get_termsem()
    {
        $data = TermSemester::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_termsem(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $terms = new TermSemester();
        $terms->title = $requestedData->title;
        $terms->description = $requestedData->description;
        $terms->save();

        return response()->json(['success'=>1,'data'=>$terms], 200,[],JSON_NUMERIC_CHECK);
    }


    public function update_termsem(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $terms = TermSemester::find($requestedData->id);
        $terms->title = $requestedData->title;
        $terms->description = $requestedData->description;
        $terms->update();
        return response()->json(['success'=>1,'data'=>$terms], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_termsem($id){
        $terms = TermSemester::find($id);
        $terms->delete();
        return response()->json(['success'=>1,'data'=>$terms], 200,[],JSON_NUMERIC_CHECK);
    }
}
