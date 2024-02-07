<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibraryIssueResource;
use App\Models\LibraryIssue;
use App\Http\Requests\StoreLibraryIssueRequest;
use App\Http\Requests\UpdateLibraryIssueRequest;
use App\Models\LibraryStock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LibraryIssueController extends Controller
{
    public function get_issued_books(Request $request)
    {
        $data = LibraryIssue::whereFranchiseId($request->user()->franchise_id)->get();
        return response()->json(['success'=>1,'data'=> LibraryIssueResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_issue_books(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $issueItem = new LibraryIssue();
        $issueItem->book_id = $requestedData->book_id;
        $issueItem->user_id = $requestedData->user_id;
        $issueItem->quantity = $requestedData->quantity;
        $issueItem->issued_on = $requestedData->issued_on;
        $issueItem->return_date = $requestedData->return_date;
        $issueItem->returned = 0;
        $issueItem->franchise_id = $request->user()->franchise_id;
        $issueItem->save();

        $data = LibraryStock::find($requestedData->book_id);
        $data->remaining = $data->remaining - $requestedData->quantity;
        $data->save();

        return response()->json(['success'=>1,'data'=>new LibraryIssueResource($issueItem)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_issue_books(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $issueItem = LibraryIssue::find($requestedData->id);
        $previousQuantity = $issueItem->quantity;
        $issueItem->book_id = $requestedData->book_id;
        $issueItem->user_id = $requestedData->user_id;
        $issueItem->issued_on = $requestedData->issued_on;
        $issueItem->return_date = $requestedData->return_date;
        $issueItem->quantity = $requestedData->quantity;
        $issueItem->update();

        if($previousQuantity > $requestedData->quantity){
            $temp = $requestedData->quantity - $previousQuantity;
            $data = LibraryStock::find($requestedData->book_id);
            $data->remaining = $data->remaining + $temp;
            $data->update();
        }else{
            $temp = $previousQuantity - $requestedData->quantity;
            $data = LibraryStock::find($requestedData->book_id);
            $data->remaining = $data->remaining - $temp;
            $data->update();
        }
        return response()->json(['success'=>1,'data'=>new LibraryIssueResource($issueItem)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_issue_books($id)
    {
        $issueItem = LibraryIssue::find($id);
        $issueItem->delete();
        return response()->json(['success'=>1,'data'=>new LibraryIssueResource($issueItem)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_return_status($id)
    {
        $data = LibraryIssue::find($id);
        $today = Carbon::today()->format("Y-m-d");
        $data->returned = $data->returned == 1? 0:1;
        $data->returned_on = $today;
        $data->update();

        $data1 = LibraryStock::find($data->book_id);
        $data1->remaining = $data1->remaining + $data->quantity;
        $data1->update();

        return response()->json(['success'=>1,'data'=>new LibraryIssueResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibraryIssueRequest $request, LibraryIssue $libraryIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryIssue $libraryIssue)
    {
        //
    }
}
