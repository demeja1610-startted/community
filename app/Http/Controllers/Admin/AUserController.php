<?php

namespace App\Http\Controllers\Admin;

use App\Enum\RouteNames\AdminRouteNamesEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AUserService;
use App\Http\Requests\Admin\AUserRequest;

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

    public function create() {
        $response = $this->aUserService->create();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/users/single', $response);
    }

    public function store(AUserRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'about',
            'roles',
            'permissions',
            'password',
        ]);

        $response = $this->aUserService->store($data);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        } else {
            session()->flash('success', $response->message);
            return redirect()->route(AdminRouteNamesEnum::page_users_edit, $response->data['user']);
        }
    }

    public function edit($user_id)
    {
        $response = $this->aUserService->edit($user_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back();
        }

        return view('admin.pages/users/single', $response);
    }

    public function update(AUserRequest $request, $tag_id)
    {
        $data = $request->only([
            'name',
            'email',
            'about',
            'roles',
            'permissions',
            'password',
        ]);

        $response = $this->aUserService->update($data, $tag_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
            return redirect()->back()->withInput();
        } else {
            session()->flash('success', $response->message);
            return redirect()->back();
        }
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

    public function toggleBan($user_id) {
        $response = $this->aUserService->toggleBan($user_id);

        if (isset($response->error)) {
            session()->flash('error', $response->error);
        } else {
            session()->flash('success', $response->message);
        }

        return redirect()->back();
    }
}
