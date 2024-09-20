<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatentResource;
use App\Models\Patent;
use App\Http\Requests\StorePatentRequest;
use App\Http\Requests\UpdatePatentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PatentController extends Controller
{
    public function get_patent()
    {
        $patent = Patent::get();
        return response()->json(['success' => 1, 'data' =>PatentResource::collection($patent)], 200, [], JSON_NUMERIC_CHECK);
    }

    public function save_patent(Request $request)
    {
        $patent = new Patent();
        $patent->name = $request['name'];
        $patent->date_of_acceptance = $request['date_of_acceptance'];
        $patent->patent_authority = $request['patent_authority'];
        if ($files = $request->file('file')) {
            $destinationPath = public_path('/patent/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) .'_'. uniqid() .'_' .date('Ymd_His'). '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $patent->file_name = $profileImage1 ?? null;
        }
        $patent->save();

        return response()->json(['success' => 1, 'data' =>new PatentResource($patent) , 'message' => 'Saved successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function update_patent(Request $request)
    {
        $patent = Patent::find($request['id']);
        $patent->name = $request['name'];
        $patent->date_of_acceptance = $request['date_of_acceptance'];
        $patent->patent_authority = $request['patent_authority'];
        if ($files = $request->file('file')) {
            if (file_exists(public_path() . '/patent/' . $patent->file_name)) {
                File::delete(public_path() . '/patent/' . $patent->file_name);
            }
            $destinationPath = public_path('/patent/');
            $extension = $files->getClientOriginalExtension();
            $profileImage1 = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME) .'_'. uniqid() .'_' .date('Ymd_His'). '.' . $extension;
            $files->move($destinationPath, $profileImage1);
            $patent->file_name = $profileImage1 ?? null;
        }
        $patent->update();
        return response()->json(['success' => 1, 'data' =>new PatentResource($patent) , 'message' => 'Updated successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    public function delete_patent($id)
    {
        $patent = Patent::find($id);
        if (file_exists(public_path() . '/patent/' . $patent->file_name)) {
            File::delete(public_path() . '/patent/' . $patent->file_name);
        }
        $patent->delete();

        return response()->json(['success' => 1, 'data' =>new PatentResource($patent) , 'message' => 'Deleted successfully'], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patent $patent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatentRequest $request, Patent $patent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patent $patent)
    {
        //
    }
}
