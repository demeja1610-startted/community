<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use App\Models\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $questions = Question::factory(50)->create();
        $questions->each(function($question) use ($faker) {
            $categoryId = $faker->numberBetween(1, 10);
            $tagId = $faker->numberBetween(1, 10);
            $category = Category::find($categoryId);
            $tag = Tag::find($tagId);
            $question->categories()->save($category);
            $question->tags()->save($tag);
        });
    }
}
