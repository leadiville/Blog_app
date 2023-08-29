<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                "title" => "post one",
                "excerpt" => "this is example",
                "min_to_read" => 3,
                "is_published" => true,
                "body" => "body of example one",
                "image_filename" => "image_url",
            ],
            [
                "title" => "data two",
                "excerpt" => "this is example 2",
                "min_to_read" => 5,
                "is_published" => true,
                "body" => "body of example two",
                "image_filename" => "image_url 2",
            ]
        ];
        foreach ($posts as $key => $value) {
            Post::create($value);
        }
    }
}
