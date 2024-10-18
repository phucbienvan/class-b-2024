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

    public function index(Request $request)
    {
        $result = $this->productService->getList();

        return ProductResource::apiPaginate($result, $request);
    }

    public function store(CreateRequest $createRequest)
    {
        $requests = $createRequest->validated();

        $result = $this->productService->create($requests);

        if ($result) {
            // return new ProductResource($result);
            return response()->api_success("Created product success", $result);
        }

        return response()->json([
            'msg' => 'them moi loi'
        ]);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Product $product, UpdateRequest $updateRequest)
    {
        $request = $updateRequest->validated();

        $result = $this->productService->update($product, $request);

        if ($result) {
            return response()->json([
                'msg' => 'Cap nhat thanh cong'
            ]);
        }

        return response()->json([
            'msg' => 'cap nhat loi'
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'msg'=> 'Deleted success',
            'data' => true
        ], 200);
    }
}
