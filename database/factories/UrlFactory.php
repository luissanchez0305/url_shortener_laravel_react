<?php

namespace Database\Factories;

use App\Models\Url;
use Illuminate\Database\Eloquent\Factories\Factory;

class UrlFactory extends Factory
{
    protected $model = Url::class;

    public function definition()
    {
        return [
            'original_url' => $this->faker->url,
            'shortened_url' => substr(md5(uniqid()), 0, 8),
        ];
    }
}
