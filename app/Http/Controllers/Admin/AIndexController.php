<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AIndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }
}
