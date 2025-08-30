<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Activity;
use App\Models\User;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        $admin = User::where('email', 'admin@sekolah.com')->first();

        return [
            'title' => $this->faker->sentence(4),
            'slug' => '',
            'description' => $this->faker->paragraph(3),
            'thumbnail' => null,
            'date' => $this->faker->date(),
            'user_id' => $admin->id,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Activity $activity) {
            $activity->slug = Str::slug($activity->title);
        });
    }
}
