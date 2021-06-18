<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Like;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 50),
            'likeable_id' => $this->faker->numberBetween(1, 50),
            'likeable_type' => $this->faker->randomElement([
                Article::class,
                Question::class,
            ])
        ];
    }
}
