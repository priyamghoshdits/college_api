<?php

namespace App\Http\Controllers;

use App\Models\VisitorBook;
use App\Http\Requests\StoreVisitorBookRequest;
use App\Http\Requests\UpdateVisitorBookRequest;
use Illuminate\Http\Request;

class VisitorBookController extends Controller
{
    public function get_visitor()
    {
        $data = VisitorBook::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_visitor_book(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $visitorBook = new VisitorBook();
        $visitorBook->purpose = $requestData->purpose;
        $visitorBook->name = $requestData->name;
        $visitorBook->phone = $requestData->phone;
        $visitorBook->icard = $requestData->icard;
        $visitorBook->date = $requestData->date;
        $visitorBook->time_in = $requestData->time_in;
        $visitorBook->time_out = $requestData->time_out;
        $visitorBook->note = $requestData->note;
        $visitorBook->save();
        return response()->json(['success'=>1,'data'=>$visitorBook], 200,[],JSON_NUMERIC_CHECK);
    }
    public function update_visitor_book(Request $request)
    {
        $requestData = (object)$request->json()->all();
        $visitorBook = VisitorBook::find($requestData->id);
        $visitorBook->purpose = $requestData->purpose;
        $visitorBook->name = $requestData->name;
        $visitorBook->phone = $requestData->phone;
        $visitorBook->icard = $requestData->icard;
        $visitorBook->date = $requestData->date;
        $visitorBook->time_in = $requestData->time_in;
        $visitorBook->time_out = $requestData->time_out;
        $visitorBook->note = $requestData->note;
        $visitorBook->update();
        return response()->json(['success'=>1,'data'=>$visitorBook], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_visitor_book($id)
    {
        $visitorBook = VisitorBook::find($id);
        $visitorBook->delete();
        return response()->json(['success'=>1,'data'=>$visitorBook], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisitorBook $visitorBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitorBookRequest $request, VisitorBook $visitorBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitorBook $visitorBook)
    {
        //
    }
}
