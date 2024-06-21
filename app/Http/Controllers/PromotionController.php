<?php

namespace App\Http\Controllers;

use App\Http\Resources\PromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PromotionController extends Controller
{
    public function get_promotion()
    {
        $data = Promotion::get();
        return response()->json(['success' => 1, 'data' => PromotionResource::collection($data)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_promotion(Request $request)
    {
        $promotion = new Promotion();
        $promotion->staff_id = $request->staff_id;
        $promotion->from = $request->from;
        $promotion->to = $request->to;
        $promotion->promotion_date = $request->promotion_date;

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/promotion_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $promotion->file = $files->getClientOriginalName();
        }

        $promotion->save();

        return response()->json(['success' => 1, 'data' => new PromotionResource($promotion)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_promotion(Request $request)
    {
        $promotion = Promotion::find($request->id);
        $promotion->staff_id = $request['staff_id'];
        $promotion->from = $request['from'];
        $promotion->to = $request['to'];
        $promotion->promotion_date = $request['promotion_date'];

        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/promotion_file/' . $promotion->file)) {
                File::delete(public_path() . '/promotion_file/' . $promotion->file);
            }

            $destinationPath = public_path('/promotion_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $promotion->file = $files->getClientOriginalName();
        }

        $promotion->update();
        return response()->json(['success' => 1, 'data' => new PromotionResource($promotion)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_promotion($id)
    {
        $data = Promotion::find($id);
        $data->delete();
        return response()->json(['success' => 1, 'data' => new PromotionResource($data)], 200, [], JSON_NUMERIC_CHECK);
    }
}
