<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function save_promotion(Request $request)
    {
        $promotion = new Promotion();
        $promotion->staff_id = $request->staff_id;
        $promotion->sl = $request->sl;
        $promotion->from = $request->from;
        $promotion->to = $request->to;

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/promotion_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $promotion->file = $files->getClientOriginalName();
        }

        $promotion->save();
    }

    public function update_promotion(Request $request)
    {
        $promotion = Promotion::whereId($request->id);
        $promotion->staff_id = $request->staff_id;
        $promotion->sl = $request->sl;
        $promotion->from = $request->from;
        $promotion->to = $request->to;

        if ($files = $request->file('file')) {
            $destinationPath = public_path('/promotion_file/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $promotion->file = $files->getClientOriginalName();
        }

        $promotion->update();
    }
}
