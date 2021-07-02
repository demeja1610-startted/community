<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AUserService;

class AUserController extends Controller
{
    protected $aUserService;

    public function __construct(AUserService $aUserService)
    {
        $this->aUserService = $aUserService;
    }

    public function index() {
        $response = $this->aUserService->index();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/users/index', $response);
    }

    public function destroy($user_id)
    {
        $response = $this->aUserService->destroy($user_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
