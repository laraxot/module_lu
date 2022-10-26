<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = \Modules\LU\Models\Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'id' => $this->faker->randomNumber(5, false),
            'group_type' => $this->faker->randomNumber(5, false),
            'group_define_name' => $this->faker->word,
            'owner_user_id' => $this->faker->randomNumber(5, false),
            'owner_group_id' => $this->faker->randomNumber(5, false),
            'is_active' => $this->faker->word,
        ];
    }
}
