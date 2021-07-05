<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class ImageService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function saveFromURL(string $url) : string
    {
        try {
            $uploadFolder = '/uploads/' . date('d-m-y') . '/';
            $publicPath = public_path($uploadFolder);
            $fileInfo = pathinfo(basename($url));
            $extension = isset($fileInfo['extension']) ? $fileInfo['extension'] : 'jpg';
            $filename = uniqid() . '.' . $extension;

            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }

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
}
