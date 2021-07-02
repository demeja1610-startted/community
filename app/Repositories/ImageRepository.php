<?php

namespace App\Repositories;

use App\Models\Image;

Class ImageRepository {
    public function adminGallery() {
        return Image::query();
    }
}
