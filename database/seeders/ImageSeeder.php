<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new ImageService();
        $faker = Factory::create();
        $savedImage = $service->saveFromURL('https://source.unsplash.com/random');

        for ($i=0; $i < 50; $i++) {
            $image = new Image([
                'url' => $savedImage,
                'alt' => $faker->text(20),
            ]);

            $image->save();
        }
    }
}
