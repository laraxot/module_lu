<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SocialProviderFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modules\LU\Models\SocialProvider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'id' => $this->faker->randomNumber,
            'user_id' => $this->faker->integer,
            'provider_id' => $this->faker->integer,
            'provider' => $this->faker->word,
            'token' => $this->faker->word,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'avatar' => $this->faker->word,
        ];
    }
}
