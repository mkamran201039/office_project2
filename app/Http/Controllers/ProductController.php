<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest; // Import the custom form request class
use App\Services\Product\ProductService;
use Exception;


class ProductController extends Controller
{
    // Methods for handling CRUD operations

    public function index(Request $request, ProductService $productService)
    {
        // Call the index method of ProductService to get products
        return $productService->index($request);
    }

  

    public function store(StoreProductRequest $request, ProductService $productService)
    {

          try{
             
                // Call the store method of ProductService to store the product
                $product = $productService->store($request);

                // Return a JSON response with the created product and a status code of 201 (created)
                return response()->json(['message' => "Product created successfully", 'product' => $product], 201);

          }

         catch(Exception $e)
         {
            return response()->json(['message' => "Failed to craete product", 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
           
         }
        
    }
        
    



    public function show($id)
    {   return "I am show ";
        $product = Product::findOrFail($id);
        return response()->json($product);
    }



    public function update(Request $request, $id)
    {  return "I am update ";
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }




    public function destroy($id)
    {   return "I am del ";
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }


}
