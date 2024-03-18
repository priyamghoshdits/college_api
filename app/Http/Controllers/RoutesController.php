<?php

namespace App\Http\Controllers;

use App\Models\Routes;
use App\Http\Requests\StoreRoutesRequest;
use App\Http\Requests\UpdateRoutesRequest;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function get_routes()
    {
        $routes = Routes::get();
        return response()->json(['success'=>1,'data'=>$routes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_routes(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $routes = new Routes();
        $routes->title = $requestedData->title;
        $routes->fare = $requestedData->fare;
        $routes->save();

        return response()->json(['success'=>1,'data'=>$routes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_routes(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $routes = Routes::find($requestedData->id);
        $routes->title = $requestedData->title;
        $routes->fare = $requestedData->fare;
        $routes->update();

        return response()->json(['success'=>1,'data'=>$routes], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_routes($id)
    {
        $routes = Routes::find($id);
        $routes->delete();
        return response()->json(['success'=>1,'data'=>$routes], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routes $routes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoutesRequest $request, Routes $routes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routes $routes)
    {
        //
    }
}
