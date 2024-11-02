<?php
namespace App\Services;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryService {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getList() {
        return $this->category->orderBy('id','desc')->get();
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
    public function create(array $data)
    {
        try {
            // Tạo mới category
            return Category::create($data);
        } catch (\Exception $e) {
            // Ghi lại lỗi vào log
            Log::error($e->getMessage());
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
}
