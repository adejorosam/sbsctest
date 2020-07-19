<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
            $response = [
                "status" => true,
                "message" => "List of all categories",
                "data" => $categories   
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $validated = $request->validated();
        $category = Category::create($validated);
        if($category){
            $response = [
                "success" => true,
                "message" => "Category added successfully",
                "data" => $category
            ];
            return response()->json($response, 201);
        }
        else{
            $response = [
                "success" => false,
                "message" => "Error",
                "data" => null
            ];
            return response()->json($response, 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::findOrFail($id);
            $response = [
            "status" => true,
            "message" => "Category details retrieved successfully",
            "data" => $category
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $category = Category::findOrFail($id);
        $validated = $request->validated();
        $updatedCategory = $category->update($validated);
        if($category){
            return response()->json([
                    'success' => true,
                    'data' => $category,
                    'message' => 'Category updated successfully!'
                ]);
        } else {
            return response()->json([
                    'success' => false,
                    'data' => 'An error occured while trying to update category'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->delete()) {
            return response([
                'status' => true,
                'data'   => null,
                'message' => 'Category deleted successfully'
            ]);
        } 
        else 
        {
            return response([
                'status' => false,
                'data' => null,
                'message' => 'Deletion Failed!'
            ]);
        } 
    }
}
