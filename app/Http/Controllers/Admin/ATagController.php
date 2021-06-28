<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ATagRequest;
use App\Services\Admin\ATagService;
use Illuminate\Http\Request;

class ATagController extends Controller
{
    protected $aTagService;

    public function __construct(ATagService $aTagService)
    {
        $this->aTagService = $aTagService;
    }

    public function index()
    {
        $response = $this->aTagService->index();

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/tags/index', ['tags' => $response]);
    }

    public function store(ATagRequest $request)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $response = $this->aTagService->store($data);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        } else {
            session()->flash('success', $response->message);
            return redirect()->back();
        }
    }

    public function edit($tag_id)
    {
        $response = $this->aTagService->edit($tag_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/tags/single', $response);
    }

    public function update(ATagRequest $request, $tag_id)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $response = $this->aTagService->update($data, $tag_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }

    public function destroy($tag_id)
    {
        $response = $this->aTagService->destroy($tag_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
