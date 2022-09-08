<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\LU\Models\PermUserRight;

class PermUserRightFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = PermUserRight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            // 'perm_user_id' => $this->faker->randomNumber(5, false),
            // 'right_id' => $this->faker->randomNumber(5, false),
            'right_level' => $this->faker->boolean,
        ];
    }
}
