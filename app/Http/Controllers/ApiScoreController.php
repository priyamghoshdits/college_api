<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiScoreResource;
use App\Models\ApiScore;
use App\Http\Requests\StoreApiScoreRequest;
use App\Http\Requests\UpdateApiScoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiScoreController extends Controller
{
    public function save_upload_file_api_score(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('paper_file')) {
            $destinationPath = public_path('/api_score/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_api_score_own(Request $request)
    {
        $api_data = ApiScore::find($request['id']);
        if ($api_data) {
            $api_data->assignment_year = $request['assignment_year'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/api_score/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $api_data->file_name = $files->getClientOriginalName();
            }

            $api_data->update();
        } else {
            $data = new ApiScore();
            $data->staff_id = $request->user()->id;
            $data->assignment_year = $request['assignment_year'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/api_score/');
                $profileImage1 = $files->getClientOriginalName();
                $files->move($destinationPath, $profileImage1);
                $data->file_name = $files->getClientOriginalName();
            }

            $data->save();
        }

        $apiScore = ApiScore::whereStaffId($request->user()->id)->get();

        return response()->json(['success' => 1, 'data' => ApiScoreResource::collection($apiScore)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_api_score(Request $request)
    {
        foreach ($request['paper_array'] as $list) {
            $data = new ApiScore();
            $data->staff_id = $list['staff_id'];
            $data->assignment_year = $list['assignment_year'];
            $data->file_name = $list['file_name'];
            $data->save();
        }
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function search_api_search(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = ApiScore::whereStaffId($requestedData->staff_id)->get();
        return response()->json(['success' => 1, 'data' => ApiScoreResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_api_score(Request $request)
    {
        $data = ApiScore::find($request['id']);
        $data->staff_id = $request['staff_id'];
        $data->assignment_year = $request['assignment_year'];

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/api_score/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->file_name = $files->getClientOriginalName();
        }
        $data->update();
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_api_score(Request $request, $id)
    {
        $data = ApiScore::find($id);
        $data->delete();

        if (Auth::user()->user_typr_id == 1) {
            $api_scores = ApiScore::get();
        } else {
            $api_scores = ApiScore::whereStaffId(Auth::id())->get();
        }
        return response()->json(['success' => 1, 'data' => ApiScoreResource::collection($api_scores)], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApiScoreRequest $request, ApiScore $apiScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiScore $apiScore)
    {
        //
    }
}
