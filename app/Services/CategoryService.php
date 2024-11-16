<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getList() {
        return $this->category->orderBy('id','desc')->get();
    }

    public function create($params)
    {
        try{
            return $this->category->create($params);
        }catch(\Exception $exception){
            Log::error($exception);

            return false;
        }
    }

    public function update($category, $data)
    {
        try {
            return $category->update($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}
