<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'banner' => $this->faker->image(
                'Storage' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'category',
                600,
                400,
                null,
                null,
                true
            )
        ];
    }
}