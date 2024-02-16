<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class MemberFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      // 'uuid' => fake()->uuid(),
      'unit_id' => fake()->numberBetween(1, 6),
      'code' => fake()->lexify(),
      'name' => fake()->name(),
      'short' => fake()->firstName(),
      'color' => fake()->hexColor(),
      'bg_color' => fake()->hexColor(),
      'is_active' => fake()->boolean(),
    ];
  }
}
