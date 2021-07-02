<?php


namespace App\Http\Controllers\LK;


class LKQuestionController extends LKIndexController
{
    public function index()
    {
        $questions = $this->user->questions()->paginate(10);
        return view('lk.pages.questions', ['questions' => $questions]);
    }
}
