<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modules\LU\Models\Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'id' => $this->faker->randomNumber,
            'group_type' => $this->faker->randomNumber,
            'group_define_name' => $this->faker->word,
            'owner_user_id' => $this->faker->integer,
            'owner_group_id' => $this->faker->integer,
            'is_active' => $this->faker->word,
        ];
    }
}
