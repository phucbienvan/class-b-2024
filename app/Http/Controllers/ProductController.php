<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    //Get all products 
    public function index()
    {
        //Get all products
        $products = Product::all();
        //Return collection of products as a resource
        return ProductResource::collection($products); 
    }

    //Create new product
    public function store(CreateRequest $createRequest)
    {
        //Get validated data from requests
        $requests = $createRequest->validated();

        //Create new product
        $result = $this->productService->create($requests);

        //Return response if success
        if ($result) {
            return new ProductResource($result);
        }

        //Return response if fail
        return response()->json([
            'msg' => 'them moi loi'
        ]);
    }
    
    //Get product by id
    public function show(Product $product)
    {
        //Return product as a resource
        return new ProductResource($product);
    }

    //Update product by id
    public function update(Product $product, UpdateRequest $updateRequest)
    {
        //Get validated data from requests
        $request = $updateRequest->validated();

        //Update product
        $result = $this->productService->update($product, $request);

        //Return response if success
        if ($result) {
            return response()->json([
                'msg' => 'Cap nhat thanh cong'
            ]);
        }

        //Return response if fail
        return response()->json([
            'msg' => 'cap nhat loi'
        ]);
    }

    //Delete product by id
    public function destroy(Product $product)
    {

        //Delete product
        $result = $this->productService->delete($product);

        //Return response if success
        if ($result) {
            return response()->json([
                'msg' => 'Delete product success'
            ]);
        }
        
        //Return response if fail
        return response()->json([
            'msg' => 'Delete product fail'
        ]);
    }

}
