<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupSubgroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modules\LU\Models\GroupSubgroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id' => $this->faker->integer,
            'subgroup_id' => $this->faker->integer,
        ];
    }
}