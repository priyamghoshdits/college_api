<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContentResource;
use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContentController extends Controller
{
    public function upload_file(Request $request)
    {
        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/content/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }
    }

    public function get_content()
    {
        $data = Content::orderBy('id', 'DESC')->get();
        return response()->json(['success'=>1,'data'=>ContentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_content(Request $request)
    {
        $data = new Content();
        $data->title = $request['title'];
        $data->type = $request['type'];
        $data->upload_date = $request['upload_date'];
        $data->course_id = $request['course_id'];
        $data->semester_id = $request['semester_id'];
        $data->subject_id = $request['subject_id'];
        // $data->content_name = $request['content_name'];
        $data->description = $request['description'];
        
        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/content/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $data->content_name = $profileImage1 ?? null;
        }
        $data->save();

        return response()->json(['success'=>1,'data'=>new ContentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_assignment()
    {
        $data = Content::orderBy('id', 'DESC')->whereType('assignment')->get();
        return response()->json(['success'=>1,'data'=>ContentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_study_material()
    {
        $data = Content::orderBy('id', 'DESC')->whereType('study-material')->get();
        return response()->json(['success'=>1,'data'=>ContentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function get_syllabus()
    {
        $data = Content::orderBy('id', 'DESC')->whereType('syllabus')->get();
        return response()->json(['success'=>1,'data'=>ContentResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_content(Request $request)
    {

        $data = Content::find($request['id']);
        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/content/' . $data->content_name)) {
                File::delete(public_path() . '/content/' . $data->content_name);
            }
        }

        $data->title = $request['title'];
        $data->type = $request['type'];
        $data->upload_date = $request['upload_date'];
        $data->course_id = $request['course_id'];
        $data->semester_id = $request['semester_id'];
        $data->subject_id = $request['subject_id'];
        $data->content_name = $request['content_name'] ?? $data->content_name;
        $data->description = $request['description'];
        $data->update();

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/content/'); // upload path
            // Upload Orginal Image
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
        }

        return response()->json(['success'=>1,'data'=>new ContentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_content($id)
    {
        $data = Content::find($id);
        if (file_exists(public_path() . '/content/' . $data->content_name)) {
            File::delete(public_path() . '/content/' . $data->content_name);
        }
        $data->delete();
        return response()->json(['success'=>1,'data'=>new ContentResource($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
    }
}
