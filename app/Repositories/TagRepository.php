<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function tagList() {
        $tags =  Tag::query();

        $tags->withCount(['articles', 'questions']);

        return $tags;
    }

    public function adminSingleTag($tag_id) {
        return Tag::byId($tag_id);
    }
}
