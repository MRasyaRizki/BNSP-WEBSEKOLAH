<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\User;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        $admin = User::where('email', 'admin@sekolah.com')->first();

        return [
            'title' => $this->faker->sentence(5),
            'slug' => '',
            'content' => $this->faker->paragraphs(3, true),
            'thumbnail' => null,
            'date' => $this->faker->date(),
            'user_id' => $admin->id,

        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (News $news) {
            $news->slug = Str::slug($news->title);
        });
    }
}
