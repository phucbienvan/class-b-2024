<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function create($params)
    {
        try {
            $params['status'] = 1;

            return $this->model->create($params);
        } catch (Exception $exception) {
            Log::error($exception);

            return false;
        }
    }

    public function update($product, $param)
    {
        try {
            $param['status'] = 0;
            $product->update($param);
            return $product;
        } catch (Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $product = $this->model->findOrFail($id);
            $product->delete();
            return $product;
        } catch (Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function forceDelete($id)
    {
        try {
            $product = $this->model->withTrashed()->findOrFail($id);
            $product->forceDelete();
            return true;
        } catch (Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
