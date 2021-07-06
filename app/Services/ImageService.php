<?php

namespace App\Services;

use App\Models\Image;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;

class ImageService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    private function getUploadsFolder() {
        return '/uploads/' . date('d-m-y') . '/';
    }

    private function getPublicUploadsPath() {
        $uploadFolder = $this->getUploadsFolder();
        $publicPath = public_path($uploadFolder);

        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        return $publicPath;
    }

    public function saveFromURL(string $url)
    {
        try {
            $uploadFolder = $this->getUploadsFolder();
            $publicPath = $this->getPublicUploadsPath();

            $fileInfo = pathinfo(basename($url));
            $extension = isset($fileInfo['extension']) ? $fileInfo['extension'] : 'jpg';
            $filename = uniqid() . '.' . $extension;

            $request = $this->client->request('GET', $url, [
                'sink' => $publicPath . $filename,
            ]);

            if ($request->getStatusCode() !== 200) {
                throw new Exception($request->getReasonPhrase(), $request->getStatusCode());
            }

            $image = $uploadFolder . $filename;

            return $image;
        } catch (Exception $e) {
            return (object) [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function saveFromFile(UploadedFile $file)
    {
        try {
            $name = uniqid();
            $path = $this->getPublicUploadsPath();
            $upload = $this->getUploadsFolder();
            $name = $name . '.' . $file->getClientOriginalExtension();
            $imageMoveSuccess = $file->move($path, $name);

            if(!$imageMoveSuccess) {
                throw new Exception('Файл не загружен', 500);
            }

            $image = new Image([
                'url' => $upload . $name,
                'alt' => $file->getClientOriginalName(),
            ]);

            $success = $image->save();
            $image->refresh();

            if(!$success) {
                throw new Exception('Произошла ошибка во время загрузки файла', 500);
            }

            return $image;
        } catch (Exception $exception) {
            return (object)[
                'code' => $exception->getCode(),
                'error' => $exception->getMessage(),
            ];
        }
    }
}
