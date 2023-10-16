<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'=>mt_rand(1,5),
            'user_id'=>mt_rand(1,3),
            'comments_content'=>$this->faker->paragraph(mt_rand(1,2)),
        ];
    }
}
