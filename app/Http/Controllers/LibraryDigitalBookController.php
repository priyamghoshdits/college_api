<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibraryDigitalBookResource;
use App\Models\LibraryDigitalBook;
use App\Http\Requests\StoreLibraryDigitalBookRequest;
use App\Http\Requests\UpdateLibraryDigitalBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LibraryDigitalBookController extends Controller
{
    public function get_digital_library_books()
    {
        $data = LibraryDigitalBook::get();

        return response()->json(['success'=>1,'data'=>LibraryDigitalBookResource::collection($data)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_digital_library_books(Request $request)
    {
        $digitalLibraryBooks = new LibraryDigitalBook();
        $digitalLibraryBooks->course_id = $request['course_id'];
        $digitalLibraryBooks->semester_id = $request['semester_id'];
        $digitalLibraryBooks->book_id = $request['book_id'];
        $digitalLibraryBooks->file_name = $request['file_name'];
        $digitalLibraryBooks->save();

        if ($files = $request->file('file')) {
            // Define upload path
            $destinationPath = public_path('/library_books/'); // upload path
            // Upload Orginal Image
            $fileName = $files->getClientOriginalName();
            $files->move($destinationPath, $fileName);
        }

        return response()->json(['success'=>1,'data'=>new LibraryDigitalBookResource($digitalLibraryBooks)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_digital_library_books(Request $request)
    {
        $digitalLibraryBooks = LibraryDigitalBook::find($request['id']);
        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/library_books/' . $digitalLibraryBooks->file_name)) {
                File::delete(public_path() . '/library_books/' . $digitalLibraryBooks->file_name);
            }

            // Define upload path
            $destinationPath = public_path('/library_books/'); // upload path
            // Upload Orginal Image
            $fileName = $files->getClientOriginalName();
            $files->move($destinationPath, $fileName);

            $digitalLibraryBooks->file_name = $request['file_name'];
        }
        $digitalLibraryBooks->course_id = $request['course_id'];
        $digitalLibraryBooks->semester_id = $request['semester_id'];
        $digitalLibraryBooks->book_id = $request['book_id'];
        $digitalLibraryBooks->update();

        return response()->json(['success'=>1,'data'=>new LibraryDigitalBookResource($digitalLibraryBooks)], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_digital_library_books($id)
    {
        $digitalLibraryBooks = LibraryDigitalBook::find($id);
        if (file_exists(public_path() . '/library_books/' . $digitalLibraryBooks->file_name)) {
            File::delete(public_path() . '/library_books/' . $digitalLibraryBooks->file_name);
        }
        $digitalLibraryBooks->delete();

        return response()->json(['success'=>1,'data'=>new LibraryDigitalBookResource($digitalLibraryBooks)], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibraryDigitalBook $libraryDigitalBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibraryDigitalBookRequest $request, LibraryDigitalBook $libraryDigitalBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryDigitalBook $libraryDigitalBook)
    {
        //
    }
}
