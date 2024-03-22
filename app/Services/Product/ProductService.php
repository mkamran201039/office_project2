<?php

namespace App\Services\Product;
use App\Http\Requests\StoreProductRequest;

use App\Models\Product;

class ProductService
{
    public function index($request)
    {   
        $query = Product::latest();

        if($request->search){
            $query->where('name', 'like', '%'.$request->search."%");
        }

        return $query->paginate($request->pagination ?? 10);

    }



    
    public function store(StoreProductRequest $request)
    {
        // Create a new Product instance and store it in the database using the validated data
        $product = Product::create($request->validated());

        // Return the created product
        return $product;
    }





}



