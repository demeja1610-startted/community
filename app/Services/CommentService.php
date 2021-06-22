<?php

namespace App\Services;

use App\Models\Comment;
use Exception;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class CommentService
{
    public function add(array $data) {
        extract($data);

        try {
            if(!$user_id) {
                throw new Exception('Пользователь не найден', 500);
            }

            if(empty($commentable_type) || empty($commentable_id)) {
                throw new Exception('Не переданы необходимые параметры', 500);
            }

            $commentable_type = Crypt::decrypt($commentable_type);
            $commentable_id = Crypt::decrypt($commentable_id);

            $model = $commentable_type::query()->find($commentable_id);

            if(!$model) {
                throw new Exception('Пост не найден', 404);
            }

            $comment_data = [
                'body' => $body,
                'parent_id' => $parent_id ?? null,
                'user_id' => $user_id,
            ];

            $comment = new Comment($comment_data);

            $model->comments()->save($comment);

            return (object) [
                'message' => 'Комментарий успешно добавлен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
