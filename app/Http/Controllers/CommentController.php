<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function add(CommentRequest $request) {
        $data = $request->only([
            'commentable_type',
            'commentable_id',
            'body',
            'parent_id',
        ]);

        $data['user_id'] = $request->user()->id;

        $response = $this->commentService->add($data);

        if(isset($response->error)) {
            session()->flash('error', 'Не удалось добавить комментарий');
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
