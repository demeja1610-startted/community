<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookmark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'bookmarkable_id' => $this->faker->numberBetween(1, 50),
            'bookmarkable_type' => $this->faker->randomElement([
                Article::class,
                Question::class,
            ])
        ];
    }
}
