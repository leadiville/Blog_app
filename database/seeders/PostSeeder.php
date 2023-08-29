<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(13)->create();

        // $made = Post::factory(3)->withUser(5)->create([]);

        // $made = Post::factory(3)->withUser2()->create([
        //     "user_id" => 6
        // ]);

        // dd(Post::factory()->published()->times(3)->create());
    }
}
