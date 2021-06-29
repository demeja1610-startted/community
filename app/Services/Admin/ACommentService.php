<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Enum\PermissionsEnum;
use Illuminate\Support\Facades\Gate;
use App\Repositories\CommentRepository;

class ACommentService
{

    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_comments);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;
            $comments = $this->commentRepository
                ->commentList()
                ->orderBy('created_at', 'DESC')
                ->paginate($paginate);

            return $comments;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function edit($comment_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_comments);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $comment = $this->commentRepository->adminSingleComment($comment_id)->first();

            if (!$comment) {
                throw new Exception('Не найдено', 404);
            }

            return $comment;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(array $data, int $comment_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_comments);

            if (!$can) {
                throw new Exception('Недостаточно прав для редактирования', 403);
            }

            $comment = Comment::byId($comment_id)->first();

            if (!$comment) {
                throw new Exception('Комментарий не найден', 404);
            }

            $comment->body = $data['comment_body'];

            $success = $comment->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать комментарий', 500);
            }

            return (object) [
                'message' => 'Комментарий успешно сохранен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy($comment_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::remove_comments);

            if (!$can) {
                throw new Exception('Недостаточно прав для удаления', 403);
            }

            $comment = Comment::find($comment_id);

            if(!$comment) {
                throw new Exception('Не найдено', 404);
            }

            $success = Comment::destroy($comment_id);

            if (!$success) {
                throw new Exception('Не удалось удалить комментарий', 500);
            }

            return (object) [
                'message' => 'Комментарий успешно удален',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function approve($comment_id) {
        try {
            $can = Gate::check(PermissionsEnum::manage_comments);

            if (!$can) {
                throw new Exception('Недостаточно прав для одобрения', 403);
            }

            $comment = Comment::find($comment_id);

            if(!$comment) {
                throw new Exception('Не найдено', 404);
            }

            $comment->is_published = true;
            $success = $comment->save();

            if (!$success) {
                throw new Exception('Не удалось одобрить комментарий', 500);
            }

            return (object) [
                'message' => 'Комментарий успешно одобрен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function unapprove($comment_id) {
        try {
            $can = Gate::check(PermissionsEnum::manage_comments);

            if (!$can) {
                throw new Exception('Недостаточно прав для отклонения', 403);
            }

            $comment = Comment::find($comment_id);

            if(!$comment) {
                throw new Exception('Не найдено', 404);
            }

            $comment->is_published = false;
            $success = $comment->save();

            if (!$success) {
                throw new Exception('Не удалось отклонить комментарий', 500);
            }

            return (object) [
                'message' => 'Комментарий успешно отклонен',
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
