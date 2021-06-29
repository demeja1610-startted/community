<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AArticleRequest;
use App\Services\Admin\AArticleService;

class AArticleController extends Controller
{
    protected $aarticleService;

    public function __construct(AArticleService $aarticleService)
    {
        $this->aarticleService = $aarticleService;
    }

    public function index() {
        $response = $this->aarticleService->index();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/articles/index', ['articles' => $response]);
        // return view('admin.pages/articles/index', ['articles' => collect([])]);
    }

    public function create() {
        $response = $this->aarticleService->create();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/articles/single');
    }

    public function store(AArticleRequest $request) {
        $data = $request->only([
            'title',
            'description',
            'user_id',
            'is_published',
        ]);

        $response = $this->aarticleService->store($data);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        } else {
            session()->flash('success', $response->message);
            return redirect()->route('page.admin.articles.edit', ['article_id' => $response->data['article_id']]);
        }
    }

    public function edit($article_id) {
        $response = $this->aarticleService->edit($article_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/articles/single', ['article' => $response]);
    }

    public function update(AArticleRequest $request, $article_id) {
        $data = $request->only([
            'title',
            'description',
            'is_published',
        ]);

        $response = $this->aarticleService->update($data, $article_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }

    public function destroy($article_id) {
        $response = $this->aarticleService->destroy($article_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
