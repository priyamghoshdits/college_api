<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_category()
    {
        $data = Category::get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function save_category(Request $request)
    {
        $data = (object)$request->json()->all();
        $category = new Category();
        $category->name = $data->name;
        $category->save();
        return response()->json(['success'=>1,'data'=>$category], 200,[],JSON_NUMERIC_CHECK);
    }

    public function update_category(Request $request)
    {
        $data = (object)$request->json()->all();
        $category = Category::find($data->id);
        $category->name = $data->name;
        $category->update();
        return response()->json(['success'=>1,'data'=>$category], 200,[],JSON_NUMERIC_CHECK);
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['success'=>1,'data'=>$category], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
