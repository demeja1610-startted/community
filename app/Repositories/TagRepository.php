<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function tagList() {
        $categories =  Tag::query();

        $categories->withCount(['articles', 'questions']);

        return $categories;
    }

    public function adminSingleTag($tag_id) {
        return Tag::byId($tag_id);
    }
}
