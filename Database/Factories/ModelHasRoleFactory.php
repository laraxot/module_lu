<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelHasRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Modules\LU\Models\ModelHasRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}
