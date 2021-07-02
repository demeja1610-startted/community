<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function index(Request $request) {
        $data = [
            'filter' => $request->input('filter') ? $request->input('filter') : 'default',
            'answered' => $request->input('answered') ? $request->input('answered') : 'default',
        ];
        $response = $this->questionService->index($data);

        return view('pages.questions.index', ['questions' =>  $response]);
    }

    public function show($slug) {
        $response = $this->questionService->show($slug);

        if(isset($response->error)) {
            abort(404, 'Не найдено');
        }

        return view('pages.questions.single', $response);
    }
}
