<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'body' => $this->faker->text(50),
            'commentable_id' => 1,
            'commentable_type' => $this->faker->randomElement([
                Article::class,
                Question::class,
            ]),
        ];
    }
}
