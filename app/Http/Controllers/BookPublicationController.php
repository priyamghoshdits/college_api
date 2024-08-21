<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookPublicationResource;
use App\Models\BookPublication;
use Illuminate\Http\Request;

class BookPublicationController extends Controller
{
    public function get_book_publication($staff_id = null)
    {
        if ($staff_id !== 'null') {
            $book_publication = BookPublication::where('staff_id', $staff_id)->get();
        } else {
            $book_publication = BookPublication::get();
        }
        return response()->json(['success' => 1, 'data' => BookPublicationResource::collection($book_publication)], 200);
    }

    public function save_upload_file_publication(Request $request)
    {
        $file_name = '';
        if ($files = $request->file('file_name')) {
            $destinationPath = public_path('/book_publication/');
            $profileImage1 = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage1);
            $file_name = $files->getClientOriginalName();
        }
        return response()->json(['success' => 1, 'file_name' => $file_name], 200);
    }

    public function save_book_publication(Request $request)
    {
        foreach ($request->book_publication_array as $value) {
            $book_publication = new BookPublication();
            $book_publication->staff_id = $value['staff_id'];
            $book_publication->book_name = $value['book_name'];
            $book_publication->ISBN_number = $value['ISBN_number'];
            $book_publication->name_of_publisher = $value['name_of_publisher'];
            $book_publication->chapter_full_book = $value['chapter_full_book'];
            $book_publication->chapter_name = $value['chapter_name'];
            $book_publication->page_number = $value['page_number'];
            $book_publication->file_name = $value['file_name'];
            $book_publication->save();
        }
        return response()->json(['success' => 1, 'data' => new BookPublicationResource($book_publication)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_book_publication_own(Request $request)
    {
        $publication = BookPublication::find($request['id']);

        if ($publication) {
            $publication->book_name = $request['book_name'];
            $publication->ISBN_number = $request['ISBN_number'];
            $publication->name_of_publisher = $request['name_of_publisher'];
            $publication->chapter_full_book = $request['chapter_full_book'];
            $publication->chapter_name = $request['chapter_name'];
            $publication->page_number = $request['page_number'];

            if ($files = $request->file('file_name')) {
                $destinationPath = public_path('/book_publication/');
                $fileName = $files->getClientOriginalName();
                $files->move($destinationPath, $fileName);
                $publication->file_name = $fileName;
            }

            $publication->update();
        } else {
            $book_publication = new BookPublication();
            $book_publication->staff_id = $request->user()->id;
            $book_publication->book_name = $request['book_name'];
            $book_publication->ISBN_number = $request['ISBN_number'];
            $book_publication->name_of_publisher = $request['name_of_publisher'];
            $book_publication->chapter_full_book = $request['chapter_full_book'];
            $book_publication->chapter_name = $request['chapter_name'];
            $book_publication->page_number = $request['page_number'];

            if ($files = $request->file('file_name')) {
                // return $files;
                $destinationPath = public_path('/book_publication/');
                $fileName = $files->getClientOriginalName();
                $files->move($destinationPath, $fileName);
                $book_publication->file_name = $fileName;
            }

            $book_publication->save();
        }

        $publications = BookPublication::whereStaffId($request->user()->id)->get();

        return response()->json(['success' => 1, 'data' => BookPublicationResource::collection($publications)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_book_publication(Request $request)
    {
        $book_publication_data = BookPublication::find($request['id']);

        $book_publication_data->staff_id = $request['staff_id'];
        $book_publication_data->book_name = $request['book_name'];
        $book_publication_data->ISBN_number = $request['ISBN_number'];
        $book_publication_data->name_of_publisher = $request['name_of_publisher'];
        $book_publication_data->chapter_full_book = $request['chapter_full_book'];
        $book_publication_data->chapter_name = $request['chapter_name'];
        $book_publication_data->page_number = $request['page_number'];

        if ($files = $request->file('file_name')) {
            // return $files;
            $destinationPath = public_path('/book_publication/');
            $fileName = $files->getClientOriginalName();
            $files->move($destinationPath, $fileName);
            $book_publication_data->file_name = $fileName;
        }

        $book_publication_data->update();

        return response()->json(['success' => 1, 'data' => null], 200);
    }

    public function delete_book_publication($id)
    {
        $book_publication = BookPublication::find($id);
        $book_publication->delete();

        $book_publication = BookPublication::get();
        return response()->json(['success' => 1, 'data' => BookPublicationResource::collection($book_publication)], 200);
    }

    public function save_book_publication_app(Request $request)
    {
        $data = $request->json()->all();

        foreach ($data as $value) {
            if($value['id'] != null){
                $book_publication = BookPublication::find($value['id']);
                $book_publication->staff_id = $value['staff_id'];
                $book_publication->book_name = $value['book_name'];
                $book_publication->ISBN_number = $value['ISBN_number'];
                $book_publication->name_of_publisher = $value['name_of_publisher'];
                $book_publication->chapter_full_book = $value['chapter_full_book'];
                $book_publication->chapter_name = $value['chapter_name'];
                $book_publication->page_number = $value['page_number'];
                $book_publication->file_name = $value['file_name'];
                $book_publication->update();
            }else{
                $book_publication = new BookPublication();
                $book_publication->staff_id = $value['staff_id'];
                $book_publication->book_name = $value['book_name'];
                $book_publication->ISBN_number = $value['ISBN_number'];
                $book_publication->name_of_publisher = $value['name_of_publisher'];
                $book_publication->chapter_full_book = $value['chapter_full_book'];
                $book_publication->chapter_name = $value['chapter_name'];
                $book_publication->page_number = $value['page_number'];
                $book_publication->file_name = $value['file_name'];
                $book_publication->save();
            }

        }
        return response()->json(['success' => 1, 'data' => new BookPublicationResource($book_publication)], 200, [], JSON_NUMERIC_CHECK);
    }
}
