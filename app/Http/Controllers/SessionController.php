<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function get_session(Request $request)
    {
        $data = Session::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_session(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = new Session();
        $data->name = $requestedData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->save();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_session(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $data = Session::find($requestedData->id);
        $data->name = $requestedData->name;
        $data->franchise_id = $request->user()->franchise_id;
        $data->update();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_session($id)
    {
        $data = Session::find($id);
        $data->delete();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}
