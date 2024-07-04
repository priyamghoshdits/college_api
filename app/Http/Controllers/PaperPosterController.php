<?php

namespace App\Http\Controllers;

use App\Models\PaperPoster;
use Illuminate\Http\Request;

class PaperPosterController extends Controller
{
    public function save_upload_file(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('paper_poster')) {
            $destinationPath = public_path('/paper_poster/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_paper_poster(Request $request)
    {
        foreach ($request['paper_poster_array'] as $value) {
            $paper_poster = new PaperPoster();
            $paper_poster->staff_id = $value['staff_id'];
            $paper_poster->topic_name = $value['topic_name'];
            $paper_poster->type = $value['type'];
            $paper_poster->venue = $value['venue'];
            $paper_poster->organized_by = $value['organized_by'];
            $paper_poster->seminer_topic = $value['seminer_topic'];
            $paper_poster->seminer_type = $value['seminer_type'];
            $paper_poster->date_from = $value['date_from'];
            $paper_poster->date_to = $value['date_to'];
            $paper_poster->duration = $value['duration'];
            $paper_poster->acivement = $value['acivement'];
            $paper_poster->file_name = $value['file_name'];
            $paper_poster->save();
        }

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_paper_poster(Request $request)
    {
        $paper_poster = PaperPoster::find($request['id']);
        $paper_poster->staff_id = $request['staff_id'];
        $paper_poster->topic_name = $request['topic_name'];
        $paper_poster->type = $request['type'];
        $paper_poster->venue = $request['venue'];
        $paper_poster->organized_by = $request['organized_by'];
        $paper_poster->seminer_topic = $request['seminer_topic'];
        $paper_poster->seminer_type = $request['seminer_type'];
        $paper_poster->date_from = $request['date_from'];
        $paper_poster->date_to = $request['date_to'];
        $paper_poster->duration = $request['duration'];
        $paper_poster->acivement = $request['acivement'];

        if ($files = $request->file('paper_poster')) {
            $destinationPath = public_path('/paper_poster/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $paper_poster->file_name = $files->getClientOriginalName();
        }

        $paper_poster->update();

        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_paper_poster($id)
    {
        $paper_poster = PaperPoster::find($id);
        $paper_poster->delete();
        return response()->json(['success' => 1, 'data' => null], 200, [], JSON_NUMERIC_CHECK);
    }
}
