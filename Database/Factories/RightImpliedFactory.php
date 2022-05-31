<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\LU\Models\RightImplied;

class RightImpliedFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = RightImplied::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'right_id' => $this->faker->integer,
            'implied_right_id' => $this->faker->integer,
        ];
    }
}
