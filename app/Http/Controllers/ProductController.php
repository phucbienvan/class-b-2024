<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store(CreateRequest $createRequest)
    {
        $requests = $createRequest->validated();

        $result = $this->productService->create($requests);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product was successfully created',
                'data' => new ProductResource($result),
            ], Response::HTTP_CREATED);
            // return new ProductResource($result);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error occurred',
        ], Response::HTTP_BAD_REQUEST);  
    }

    public function show(Product $product)
    {
        $user = auth()->user();
        dd($user);

        return response()->json([
            'status' => 'success',
            'message' => 'Product was successfully gotten',
            'data' => new ProductResource($product),
        ], Response::HTTP_OK);
    }

    public function update(Product $product, UpdateRequest $updateRequest)
    {
        $request = $updateRequest->validated();
        
        $result = $this->productService->update($product, $request);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product was successfully updated',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error occurred',
        ], Response::HTTP_BAD_REQUEST);  
    }

    public function softDelete(Product $product)
    {     
        $result = $this->productService->softDelete($product);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'The product was successfully soft deleted',
            ], Response::HTTP_NO_CONTENT);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error occurred',
        ], Response::HTTP_BAD_REQUEST);  
    }

    public function hardDelete(Product $product)
    {     
        $result = $this->productService->hardDelete($product);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'The product was successfully hard deleted',
            ], Response::HTTP_NO_CONTENT);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error occurred',
        ], Response::HTTP_BAD_REQUEST);  
    }

    public function restore($id)
    {
        $result = $this->productService->restore($id);

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'The product was successfully restored',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error occurred',
        ], Response::HTTP_BAD_REQUEST);  
    }
}
