<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Profile::class;
    
    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'age' => $this->faker->numberBetween(17,80),
            'address' => $this->faker->address()
        ];
    }
}
