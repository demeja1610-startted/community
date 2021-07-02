<?php

namespace App\Services\Admin;

use Exception;
use App\Models\Tag;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Question;
use App\Enum\SettingsEnum;
use App\Enum\PermissionsEnum;
use App\Services\Admin\ATagService;
use Illuminate\Support\Facades\Gate;
use App\Repositories\QuestionRepository;
use App\Services\Admin\ACategoryService;

class AQuestionService
{

    protected $questionRepository;
    protected $acategoryService;
    protected $aTagService;

    public function __construct(
        QuestionRepository $questionRepository,
        ACategoryService $aCategoryService,
        ATagService $aTagService
    ) {
        $this->questionRepository = $questionRepository;
        $this->acategoryService = $aCategoryService;
        $this->aTagService = $aTagService;
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

            $categories = Category::all();
            $tags = Tag::all();

            return [
                'categories' => $categories,
                'tags' => $tags,
            ];
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

            if (!isset($data['save'])) {
                $question->is_published = true;
            }

            if (isset($data['stash'])) {
                $question->is_published = false;
            }

            $success = $question->save();

            if (!$success) {
                throw new Exception('Не удалось сохранить вопрос', 500);
            }

            $question->refresh();

            if(!empty($data['categories'])) {
                $response = $this->acategoryService->saveCategoriesToModel($question, $data['categories']);

                if(isset($response->error)) {
                    throw new Exception($response->error, $response->code);
                }
            }

            if(!empty($data['tags'])) {
                $response = $this->aTagService->saveTagsToModel($question, $data['tags']);

                if(isset($response->error)) {
                    throw new Exception($response->error, $response->code);
                }
            }

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

            $categories = Category::all();
            $tags = Tag::all();

            return [
                'question' => $question,
                'categories' => $categories,
                'tags' => $tags,
            ];
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

            if (!isset($data['save'])) {
                $question->is_published = true;
            }

            if (isset($data['stash'])) {
                $question->is_published = false;
            }

            $success = $question->save();

            if (!$success) {
                throw new Exception('Не удалось редактировать вопрос', 500);
            }

            if(!empty($data['categories'])) {
                $response = $this->acategoryService->saveCategoriesToModel($question, $data['categories']);

                if(isset($response->error)) {
                    throw new Exception($response->error, $response->code);
                }
            }

            if(!empty($data['tags'])) {
                $response = $this->aTagService->saveTagsToModel($question, $data['tags']);

                if(isset($response->error)) {
                    throw new Exception($response->error, $response->code);
                }
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
