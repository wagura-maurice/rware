<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Business;
use App\Models\Application;
use Illuminate\Support\Carbon;
use App\Models\CertificationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gig = ['DESC', 'ASC'];

        $category = CertificationCategory::find(rand(1, CertificationCategory::count()));

        return [
            'uniqueID' => $this->faker->uuid(),
            'user_id' => rand(1, User::count()),
            'business_id' => rand(1, Business::count()),
            'category_id' => rand(1, CertificationCategory::count()),
            'total_amount' => $category->price * rand(85, 225),
            'description' => $this->faker->sentences(3, true)
        ];
    }
}
