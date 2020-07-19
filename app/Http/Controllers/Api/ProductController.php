<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Jobs\CreateFiftyProducts;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;



class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('forceJson');
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('category')->paginate(20);
        $response = [
                "status" => true,
                "message" => "List of all products",
                "data" => $products   
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $validated = $request->validated();
        if($request->hasFile('image')){
                $image = $validated['image'];
                $imageName = time() . '_' . $image->getClientOriginalName();
                $validated['image'] = $imageName;
        }
        $request->image->storeAs('public/images', $imageName);
        $product = Product::create($validated);
        if($product){
            $response = [
                "success" => true,
                "message" => "Product created successfully",
                "data" => $product
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
        $product = Product::where('id',$id)->with('category')->get();
        if(count($product) > 0){
            $response = [
            "status" => true,
            "message" => "Product details retrieved successfully",
            "data" => $product
        ];
            return response()->json($response, 200);
        }
        else{
            $response = ["message" => "Product does not exist", "data" => null];
            return response()->json($response,404);
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $validated = $request->validated();
        if($request->hasFile('image')){
                $image = $validated['image'];
                $imageName = time() . '_' . $image->getClientOriginalName();
                $validated['image'] = $imageName;
                $request->image->storeAs('public/images', $imageName);
        }
        
        $updatedProduct = $product->update($validated);
        if($updatedProduct){
            $response = [
                "success" => true,
                "message" => "Product updated successfully",
                "data" => $product
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        if($product->delete()) {
            return response([
                'status' => true,
                'data'   => null,
                'message' => 'Product deleted successfully!'
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

    public function makeFiftyProducts(){
        $job = (new CreateFiftyProducts());
        dispatch($job);
        echo 'Products created';
    }

    /**
    * Export to excel
    */
    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'product.xlsx');
    }
    /**
    * Export to csv
    */
    public function exportCSV()
    {
        return Excel::download(new ProductExport, 'product.csv');
    }
}


