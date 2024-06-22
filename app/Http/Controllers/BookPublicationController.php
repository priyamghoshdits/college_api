<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookPublicationResource;
use App\Models\BookPublication;
use Illuminate\Http\Request;

class BookPublicationController extends Controller
{
    public function get_book_publication($staff_id = null)
    {
        if ($staff_id) {
            $book_publication = BookPublication::where('staff_id', $staff_id)->get();
        } else {
            $book_publication = BookPublication::get();
        }
        return response()->json(['success' => 1, 'data' => BookPublicationResource::collection($book_publication)], 200);
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
            $book_publication->save();
        }
        return response()->json(['success' => 1, 'data' => new BookPublicationResource($book_publication)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_book_publication(Request $request)
    {
        foreach ($request->book_publication_array as $value) {

            $book_publication_data = BookPublication::find($value['id']);

            if (!$book_publication_data) {
                $book_publication = new BookPublication();
                $book_publication->staff_id = $value['staff_id'];
                $book_publication->book_name = $value['book_name'];
                $book_publication->ISBN_number = $value['ISBN_number'];
                $book_publication->name_of_publisher = $value['name_of_publisher'];
                $book_publication->chapter_full_book = $value['chapter_full_book'];
                $book_publication->chapter_name = $value['chapter_name'];
                $book_publication->page_number = $value['page_number'];
                $book_publication->save();
            } else {
                $book_publication_data->staff_id = $value['staff_id'];
                $book_publication_data->book_name = $value['book_name'];
                $book_publication_data->ISBN_number = $value['ISBN_number'];
                $book_publication_data->name_of_publisher = $value['name_of_publisher'];
                $book_publication_data->chapter_full_book = $value['chapter_full_book'];
                $book_publication_data->chapter_name = $value['chapter_name'];
                $book_publication_data->page_number = $value['page_number'];
                $book_publication_data->update();
            }
        }
        return response()->json(['success' => 1, 'data' => null], 200);
    }

    public function delete_book_publication($id)
    {
        $book_publication = BookPublication::find($id);
        $book_publication->delete();

        $book_publication = BookPublication::get();
        return response()->json(['success' => 1, 'data' => BookPublicationResource::collection($book_publication)], 200);
    }
}
