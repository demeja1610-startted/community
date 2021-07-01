<?php
namespace App\Enum;

use App\Models\Article;
use App\Models\Question;

class CommentableRoutesEnum {
    public static function values() {
        return [
            with(new Article)->getTable() => 'page.articles.single',
            with(new Question())->getTable() => 'page.questions.single',
        ];
    }
}
