<?php
namespace App\Helpers\General;

use App\Models\Article;
use App\Models\Question;
use Exception;
use Illuminate\Database\Eloquent\Model;

class CommentableRouteHelper {
    protected static function commentableRoutes() {
        return [
            with(new Article)->getTable() => 'page.articles.single',
            with(new Question())->getTable() => 'page.questions.single',
        ];
    }

    public static function getUrl(Model $model) {
        try {
            $commentableRoutes = self::commentableRoutes();

            if(!isset($model->commentable)) {
                throw  new Exception('Not commentable', 500);
            }

            $tableName = $model->commentable->getTable();

            $hasUrl = array_key_exists($tableName, $commentableRoutes);

            if(!$hasUrl) {
                return false;
            }

            return route($commentableRoutes[$tableName], $model);
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
