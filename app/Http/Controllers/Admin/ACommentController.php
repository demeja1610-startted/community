<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ACommentRequest;
use App\Services\Admin\ACommentService;
use Illuminate\Http\Request;

class ACommentController extends Controller
{
    protected $aCommentService;

    public function __construct(ACommentService $aCommentService)
    {
        $this->aCommentService = $aCommentService;
    }

    public function index()
    {
        $response = $this->aCommentService->index();

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/comments/index', ['comments' => $response]);
    }

    public function edit($comment_id)
    {
        $response = $this->aCommentService->edit($comment_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/comments/single', ['comment' => $response]);
    }

    public function update(ACommentRequest $request, $comment_id)
    {
        $data = $request->only([
            'comment_body',
        ]);

        $response = $this->aCommentService->update($data, $comment_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }

    public function destroy($comment_id)
    {
        $response = $this->aCommentService->destroy($comment_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }

    public function toggleApprove($comment_id) {
        $response = $this->aCommentService->toggleApprove($comment_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
