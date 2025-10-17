<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'icon' => $this->faker->randomElement(['💎', '⭐', '🔥', '✨', '🎮', '👑', '💫', '🎯']),
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(8),
            'price'=>$this->faker->numberBetween(10000,100000),
            'originalPrice' => $this->faker->numberBetween(10000, 100000),
            'discount' => $this->faker->numberBetween(0, 50),
            'pricePerDiamond' => $this->faker->numberBetween(100, 5000),
            'popular' => $this->faker->boolean(30), // 30% chance of being popular
        ];
    }

    // State Methods for specific scenarios
    public function popular(): static
    {
        return $this->state(fn (array $attributes) => [
            'popular' => true,
        ]);
    }

    public function notPopular(): static
    {
        return $this->state(fn (array $attributes) => [
            'popular' => false,
        ]);
    }

    public function withHighDiscount(): static
    {
        return $this->state(fn (array $attributes) => [
            'discount' => $this->faker->numberBetween(30, 70),
        ]);
    }

    public function withNoDiscount(): static
    {
        return $this->state(fn (array $attributes) => [
            'discount' => 0,
        ]);
    }

    public function expensive(): static
    {
        return $this->state(fn (array $attributes) => [
            'originalPrice' => $this->faker->numberBetween(50000, 200000),
            'pricePerDiamond' => $this->faker->numberBetween(1000, 10000),
        ]);
    }

    public function cheap(): static
    {
        return $this->state(fn (array $attributes) => [
            'originalPrice' => $this->faker->numberBetween(5000, 30000),
            'pricePerDiamond' => $this->faker->numberBetween(50, 500),
        ]);
    }
}
