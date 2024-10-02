<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService {
    protected $model;

    //Inject model
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    //Get all products
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

    //Get all products
    public function update($product, $param)
    {
        $param['status'] = 0;
        return $product->update($param);
    }

    //Get all products
    public function delete(Product $product)
    {
    try {
        return $product->delete();
    } catch (\Exception $e) {
        return false;
        }
    }

}
