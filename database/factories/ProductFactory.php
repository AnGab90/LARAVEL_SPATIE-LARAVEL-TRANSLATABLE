<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = 'in stock';
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->text(20),
            'image'=>$this->faker->image('public/storage',600,480, null, false),
            'status'=>$status,
        ];
    }
}
