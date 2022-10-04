<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->word . now()->format('YmdHis'),
            'preview' => $this->faker->image('storage/app/public', 400, 300, null, false),
            'content' => 'TEST',
            'user_id' => User::get()->random()->id,
            'category_id' => Category::get()->random()->id
        ];
    }
}
