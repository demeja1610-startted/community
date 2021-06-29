<?php

namespace App\Services;

use Exception;
use App\Models\Question;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Repositories\QuestionRepository;

class QuestionService
{

    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index() {
        $questions = $this->questionRepository->questionList();
        $paginate = Setting::where('slug', SettingsEnum::questions_pagination)->first()->value;
        return $questions->paginate($paginate);
    }

    public function show($slug)
    {
        try {
            $question = $this->questionRepository->singlePageQuestion($slug)->first();

            if(!$question) {
                throw new Exception('Не найдено', 404);
            }

            $settings = Setting::query()->whereIn('slug', [SettingsEnum::comments_depth, SettingsEnum::comments_pagination])->get();
            $max_depth = $settings->filter(function($setting) {
                return $setting->slug === SettingsEnum::comments_depth;
            })->first()->value;
            $paginate = $settings->filter(function($setting) {
                return $setting->slug === SettingsEnum::comments_pagination;
            })->first()->value;

            $comments = $question->comments()->orderBy('created_at', 'DESC')->paginate($paginate);

            return [
                'question' => $question,
                'max_depth' => $max_depth ?? 5,
                'comments' => $comments,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
