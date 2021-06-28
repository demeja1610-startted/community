<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ACategoryRequest;
use App\Models\Category;
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

        return view('admin.pages/categories/index', $response);
    }

    public function store(ACategoryRequest $request) {
        $data = $request->only([
            'title',
            'description',
            'category_id',
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

        return view('admin.pages/categories/single', $response);
    }

    public function update(ACategoryRequest $request, $category_id) {
        $data = $request->only([
            'title',
            'description',
            'category_id',
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
