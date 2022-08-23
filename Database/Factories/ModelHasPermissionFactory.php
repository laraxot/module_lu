<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\LU\Models\ModelHasPermission;

class ModelHasPermissionFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Modules\LU\Models\ModelHasPermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
       

        return [
            
        ];
    }
}
