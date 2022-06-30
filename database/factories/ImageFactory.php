<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence(),
            'slug' => str($title)->slug(),
            'file' => $this->faker->imageUrl($width = 1920, $height = 1280),
            'dimension' => $width . 'x' . $height,
            'views_count' => $this->faker->randomNumber(5),
            'downloads_count' => $this->faker->randomNumber(5),
            'is_published' => true,
            'user_id' => User::factory(),
        ];
    }
}
