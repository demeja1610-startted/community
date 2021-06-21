<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
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
        $additional_users = [
            [
                'data' => [
                    'name' => 'admin',
                    'email' => 'admin@community.com',
                    'password' => bcrypt('slnf.kjb=f23232ff-'),
                ],
                'roles' => [
                    RolesEnum::user,
                    RolesEnum::admin,
                ]
            ],
            [
                'data' => [
                    'name' => 'super_admin',
                    'email' => 'super_admin@community.com',
                    'password' => bcrypt('slnf.kjb=f23232ff-'),
                ],
                'roles' => [
                    RolesEnum::user,
                    RolesEnum::admin,
                    RolesEnum::super_admin,
                ]
            ],
        ];

        $users = User::factory(50)->create()->each(function ($user) use ($faker) {
            DB::table('subscriptions')->insert([
                'user_id' => $user->id,
                'subscriber_id' => $faker->unique()->numberBetween(1, 50),
            ]);

            $user->assignRole(RolesEnum::user);
        });

        foreach ($additional_users as $additional_user) {
            $user = new User($additional_user['data']);
            $user->save();

            $user->assignRole($additional_user['roles']);
        }
    }
}
