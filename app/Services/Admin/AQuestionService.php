<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Enum\PermissionsEnum;
use App\Models\Question;
use Illuminate\Support\Facades\Gate;
use App\Repositories\QuestionRepository;

class AQuestionService
{

    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_questions);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $questions = $this->questionRepository->questionList()->with('user')->orderBy('created_at', 'DESC');;
            $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first()->value;

            return $questions->paginate($paginate);
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function create()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_questions);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            return 1;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function store(array $data) {
        try {
            $can = Gate::check(PermissionsEnum::manage_questions);

            if (!$can) {
                throw new Exception('Недостаточно прав для создания', 403);
            }

            $question = new Question();
            $question->title = $data['title'];
            $question->description = $data['description'];
            $question->user_id = $data['user_id'];

            $success = $question->save();

            if (!$success) {
                throw new Exception('Не удалось сохранить вопрос', 500);
            }
            $question->refresh();

            return (object) [
                'message' => 'Вопрос успешно сохранен',
                'code' => 200,
                'data' => [
                    'question_id' => $question->id,
                ],
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function edit($question_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_questions);

            if (!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $question = $this->questionRepository->adminSingleQuestion($question_id)->first();

            if (!$question) {
                throw new Exception('Не найдено', 404);
            }

            return $question;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function update(array $data, int $question_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_questions);

            if (!$can) {
                throw new Exception('Недостаточно прав для редактирования', 403);
            }

            $question = Question::byId($question_id)->first();

            if (!$question) {
                throw new Exception('Вопрос не найдена', 404);
            }

            $question->title = $data['title'];
            $question->description = $data['description'];

            $success = $question->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать вопрос', 500);
            }

            return (object) [
                'message' => 'Вопрос успешно сохранен',
                'code' => 200,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function destroy($question_id)
    {
        try {
            $can = Gate::check(PermissionsEnum::remove_questions);

            if (!$can) {
                throw new Exception('Недостаточно прав для удаления', 403);
            }

            $success = Question::destroy($question_id);

            if (!$success) {
                throw new Exception('Не удалось удалить вопрос', 500);
            }

            return (object) [
                'message' => 'Вопрос успешно удален',
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
