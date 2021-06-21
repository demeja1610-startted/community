<?php

namespace Database\Factories;

use App\Enum\VoiceTypeEnum;
use App\Models\Comment;
use App\Models\Voice;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique(true)->numberBetween(1, 50),
            'type' => $this->faker->randomElement(VoiceTypeEnum::values()),
            'voiceable_id' => $this->faker->numberBetween(1, 50),
            'voiceable_type' => Comment::class,
        ];
    }
}
