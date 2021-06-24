<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ACategoryRequest;
use App\Services\Admin\ACategoryService;

class ACategoryController extends Controller
{
    protected $aCategoryService;

    public function __construct(ACategoryService $aCategoryService)
    {
        $this->aCategoryService = $aCategoryService;
    }

    public function index() {
        $response = $this->aCategoryService->index();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/categories/index', ['categories' => $response]);
    }

    // public function create() {
    //     $response = $this->aarticleService->create();

    //     if(isset($response->error)) {
    //         session()->flash('error', $response->error);
    //         return redirect()->back();
    //     }

    //     return view('admin.pages/articles/single');
    // }

    public function store(ACategoryRequest $request) {
        $data = $request->only([
            'title',
            'description',
        ]);

        $response = $this->aCategoryService->store($data);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        } else {
            session()->flash('success', $response->message);
            return redirect()->back();
        }
    }

    public function edit($category_id) {
        $response = $this->aCategoryService->edit($category_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/categories/single', ['category' => $response]);
    }

    public function update(ACategoryRequest $request, $category_id) {
        $data = $request->only([
            'title',
            'description',
        ]);

        $response = $this->aCategoryService->update($data, $category_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }

    public function destroy($category_id) {
        $response = $this->aCategoryService->destroy($category_id);

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
