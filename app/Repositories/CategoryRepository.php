<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function categoryList() {
        $categories =  Category::query();

        $categories->withCount(['articles', 'questions']);

        return $categories;
    }

    public function adminSingleCategory($category_id) {
        return Category::byId($category_id);
    }
}
