<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\LU\Models\PermUserRight;

class PermUserRightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PermUserRight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'perm_user_id' => $this->faker->integer,
            'right_id' => $this->faker->integer,
            'right_level' => $this->faker->boolean,
        ];
    }
}
