<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService {
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function create($params)
    {
        try{
            return $this->model->create($params);
        }catch(Exception $exception){
            Log::error($exception);

            return false;
        }
        
    }

    public function update($product, $param)
    {
        try{
            return $product->update($param);
        }catch(Exception $exception){
            Log::error($exception);
            return false;
        }
    }

    public function softDelete($product)
    {
        try{
            return $product->delete();
        }catch(Exception $exception){
            Log::error($exception);
            return false;
        }  
    }

    public function hardDelete($product)
    {
        try{
            return $product->forceDelete();
        }catch(Exception $exception){
            Log::error($exception);
            return false;
        }  
    }

    public function restore($id)
    {
        try{
            $product = $this->model->withTrashed()->find($id);
            if ($product->trashed()) {
                return $product->restore();
            } else {
                return false;
            } 
        }catch(Exception $exception){
            Log::error($exception);
            return false;
        }  
    }
}
