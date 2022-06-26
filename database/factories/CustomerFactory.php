<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'company_id' => \App\Models\Company::factory()->create(),
            'company_id' => Company::factory()->create(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'active' => 1,


        ];
    }
}
