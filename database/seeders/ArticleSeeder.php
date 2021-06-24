<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::factory(50)->create();
        $faker = Factory::create();

        $articles->each(function($article) use ($faker) {
            $imageID = $faker->numberBetween(1, 50);
            $image = Image::find($imageID);

            $article->images()->save($image);
        });
    }
}
