<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AQuestionService;
use App\Http\Requests\Admin\AQuestionRequest;

class AQuestionController extends Controller
{
    protected $aQuestionService;

    public function __construct(AQuestionService $aQuestionService)
    {
        $this->aQuestionService = $aQuestionService;
    }

    public function index() {
        $response = $this->aQuestionService->index();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/questions/index', ['questions' => $response]);
    }

    public function create() {
        $response = $this->aQuestionService->create();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/questions/single', $response);
    }

    public function store(AQuestionRequest $request) {
        $data = $request->only([
            'title',
            'description',
            'user_id',
            'save',
            'stash',
            'categories',
            'tags',
        ]);

        $response = $this->aQuestionService->store($data);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        } else {
            session()->flash('success', $response->message);
            return redirect()->route('page.admin.questions.edit', ['question_id' => $response->data['question_id']]);
        }
    }

    public function edit($question_id) {
        $response = $this->aQuestionService->edit($question_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/questions/single', $response);
    }

    public function update(AQuestionRequest $request, $question_id) {
        $data = $request->only([
            'title',
            'description',
            'save',
            'stash',
            'categories',
            'tags',
        ]);

        $response = $this->aQuestionService->update($data, $question_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }

    public function destroy($question_id) {
        $response = $this->aQuestionService->destroy($question_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
