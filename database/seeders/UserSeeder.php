<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $users = User::factory(50)->create()->each(function($user) use ($faker){
            DB::table('subscriptions')->insert(
                [
                    'user_id' => $user->id,
                    'subscriber_id' => $faker->unique()->numberBetween(1, 50),
                ]
            );
        });
    }
}
