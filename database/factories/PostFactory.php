<?php

namespace Database\Factories;

use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                "title" => $this->faker->unique()->sentence(),
                "excerpt" => $this->faker->realText($maxNbChars = 50),
                "body" => $this->faker->text(),
                "min_to_read" => $this->faker->numberBetween(1, 10),
                "is_published" => 1,
                "image_filename" => $this->faker->imageUrl(300, 230),
                "user_id" => 1,
        ];
    }
}
