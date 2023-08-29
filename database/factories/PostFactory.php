<?php

namespace Database\Factories;

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
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
        // $user = User::find(1);

        // if (!$user) {
        //     $user = User::factory()->create();
        // }

        return [
            "title" => $this->faker->unique()->sentence(),
            "excerpt" => $this->faker->realText($maxNbChars = 50),
            "body" => $this->faker->text(),
            "min_to_read" => $this->faker->numberBetween(1, 10),
            "is_published" => 1,
            "image_filename" => $this->faker->imageUrl(300, 230),
            "user_id" => function () {
                return User::factory()->create();
            }
        ];
    }

    public function withUser(int $userId): Factory
    {
        $user = User::find($userId);

        if (!$user) {
            $user = User::factory()->create(["id" => $userId]);
        }

        return $this->state(function (array $attributes) use ($userId) {
            return ['user_id' => $userId];
        });
    }

    public function withUser2(): Factory
    {
        return $this->state(function (array $attributes) {
            return $attributes;
        })->afterMaking(function (Post $post) {
            $user = User::find($post->user_id);

            if (!$user) {
                $user = User::factory()->create(["id" => $post->user_id]);
            }
        });
    }

    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return ["is_published" => 1];
        });
    }
}
