<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gig = ['DESC', 'ASC'];

        return [
            'user_id' => rand(1, User::count()),
            'name' => $this->faker->unique()->company,
            'description' => $this->faker->sentences(3, true)
        ];
    }
}
