<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AGalleryService;

class AGalleryController extends Controller
{
    protected $aGalleryService;

    public function __construct(AGalleryService $aGalleryService)
    {
        $this->aGalleryService = $aGalleryService;
    }

    public function index() {
        $response = $this->aGalleryService->index();

        if(isset($response->error)) {
            session()->flash('error', $response->error);
        }

        return view('admin.pages/gallery/index', $response);
    }
}
