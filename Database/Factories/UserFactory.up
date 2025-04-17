<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// ---- models ----
use Modules\LU\Models\User as Model;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * Class UserFactory.
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        // 43     Access to an undefined property Faker\UniqueGenerator::$userName.
        // 46     Access to an undefined property Faker\UniqueGenerator::$safeEmail.

        return [
            'handle' => $faker->unique()->userName(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->firstName(),
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            // 'passwd' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'passwd' => '12345678', // secret
            'remember_token' => Str::random(10),
        ];
    }
}
