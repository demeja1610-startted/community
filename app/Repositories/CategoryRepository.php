<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function categoryList() {
        return Category::query()->withCount(['articles', 'questions']);
    }

    public function adminSingleCategory($category_id) {
        return Category::byId($category_id);
    }
}
