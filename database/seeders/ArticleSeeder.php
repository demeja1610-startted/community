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
            $image = Image::find(1);

            $article->images()->save($image);
        });
    }
}
