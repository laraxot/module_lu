<?php

declare(strict_types=1);

namespace Modules\LU\Database\Factories;

use Modules\LU\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Undocumented class.
 */
class NotificationFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'id' => $this->faker->word,
            'type' => $this->faker->word,
            'notifiable_type' => $this->faker->word,
            //'notifiable_id' => $this->faker->randomNumber(5, false),
            'data' => $this->faker->text,
            'read_at' => $this->faker->dateTime,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}