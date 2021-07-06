<?php

namespace App\Services\Admin;

use App\Enum\PermissionsEnum;
use Exception;
use App\Repositories\ImageRepository;
use App\Services\ImageService;
use Illuminate\Support\Facades\Gate;

class AGalleryService
{

    protected $imageRepository;
    protected $imageService;

    public function __construct(
        ImageRepository $imageRepository,
        ImageService $imageService
    ) {
        $this->imageRepository = $imageRepository;
        $this->imageService = $imageService;
    }

    public function index()
    {
        try {
            $can = Gate::check(PermissionsEnum::manage_images);

            if(!$can) {
                throw new Exception('Недостаточно прав для просмотра', 403);
            }

            $images = $this->imageRepository
                ->adminGallery()
                ->orderByDesc('created_at')
                ->paginate(30);

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

    public function store(array $files) {
        try {
            $images = [];

            foreach($files as $file) {
                $image = $this->imageService->saveFromFile($file);

                if(!isset($image->error)) {
                    $images[] = [
                        'url' => $image->url,
                        'alt' => $image->alt,
                        'view' => view('admin.components/gallery/item', ['image' => $image])->render(),
                    ];
                }
            }

            if(empty($images)) {
                throw new Exception('Произошла ошибка во время загрузки, файлы не были загружены', 500);
            }

            return (object) [
                'message' => 'Изображения успешно загружены',
                'code' => 200,
                'data' => [
                    'images' => $images,
                ],
            ];
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
}
