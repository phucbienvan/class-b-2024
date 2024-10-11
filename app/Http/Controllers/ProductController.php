<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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
            return new ProductResource($result);
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

    public function delete(Product $product)
    {
        $result = $this->productService->delete($product);
        if ($result){
            return response()->json([
                'status'=> 'sucess',
                'message'=> 'Xóa thành công',
            ], Response::HTTP_NO_CONTENT);
        }
        else
        {
            return response()->json([
                'status'=> 'failed',
                'message'=> 'Xóa không thành công',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function restore(Product $product)
    {
        $result = $this->productService->restore($product);
        if ($result){
            return response()->json([
                'status'=> 'success',
                'message'=> 'Khôi phục thành công',
            ], Response::HTTP_OK);
        }
        else
        {
            return response()->json([
                'status'=> 'failed',
                'message"=> "Khôi phục không thành công',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
