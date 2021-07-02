<?php

namespace App\Http\Controllers\LK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LKSettingController extends Controller
{
    public function index()
    {
        return view('lk.pages.page-settings');
    }
}
