<?php

namespace App\Http\Controllers\API\v1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AGalleryService;
use App\Http\Requests\Admin\AUploadImagesRequest;

class ApiAGalleryController extends Controller
{
    protected $aGalleryService;

    public function __construct(AGalleryService $aGalleryService)
    {
        $this->aGalleryService = $aGalleryService;
    }

    public function store(AUploadImagesRequest $request) {
        $files = $request->file('images');
        $response = $this->aGalleryService->store($files);

        return response()->json($response, isset($response->code) ? $response->code : 200);
    }
}
