<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{

    protected $imageService;
    protected $faker;

    public function __construct()
    {
        $this->imageService = new ImageService();
        $this->faker = Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $savedImage = $this->imageService->saveFromURL('https://source.unsplash.com/random');

        if(!isset($savedImage->error)) {
            $image = new Image([
                'url' => $savedImage,
                'alt' => $this->faker->text(20),
            ]);

            $image->save();
        }
    }
}
