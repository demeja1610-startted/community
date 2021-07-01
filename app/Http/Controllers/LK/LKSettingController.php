<?php

namespace App\Http\Controllers\LK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LKSettingController extends Controller
{
    public function index(Request $request)
    {
//        $user = $request->user();
        return view('lk.pages.settings');
    }
}
