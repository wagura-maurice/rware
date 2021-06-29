<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Storage::disk('local')->makeDirectory('public/uploads/images/campaigns');

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Youtube($faker));

        return [
            'platform_id' => \App\Models\Platform::whereName('youtube')->first()->id,
            'title' => $this->faker->unique()->city,
            'description' => $this->faker->paragraph(rand(1, 3)),
            'cover' => $faker->image(storage_path('app/public/uploads/images/campaigns'), 400, 300, null, false),
            'payload' => $faker->youtubeUri()
        ];
    }
}
