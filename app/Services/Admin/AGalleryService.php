<?php

namespace App\Services\Admin;

use App\Enum\PermissionsEnum;
use Exception;
use App\Models\Setting;
use App\Enum\SettingsEnum;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Gate;

class AGalleryService
{

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_images);

            if(!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            // $paginate = Setting::where('slug', SettingsEnum::articles_pagination)->first();
            // $images = $this->imageRepository->adminGallery()->paginate($paginate->value ?? 50);
            $images = $this->imageRepository->adminGallery()->paginate(30);

            return [
                'images' => $images,
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
