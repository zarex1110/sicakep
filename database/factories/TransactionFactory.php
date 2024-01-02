<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title' => $this->faker->sentence(mt_rand(2,4)),
                'amount' => rand(10000,30000),
                'type_id' => rand(1,3),
                'used' => 'BRI',
                'payment' => 'QRIS',
                'invoice' => 'yes',
                'user_id' => rand(1,3)
        ];
    }
}
