<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RightFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Modules\LU\Models\Right::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'id' => $this->faker->randomNumber,
            'area_id' => $this->faker->integer,
            'right_define_name' => $this->faker->word,
            'has_implied' => $this->faker->word,
            'has_level' => $this->faker->word,
        ];
    }
}
