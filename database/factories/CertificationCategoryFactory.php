<?php

namespace Database\Factories;

use App\Models\CertificationCategory;
use App\Models\CertificationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CertificationCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gig = ['DESC', 'ASC'];

        return [
            'certification_type_id' => rand(1, CertificationType::count()),
            'name' => $this->faker->unique()->word,
            'price' => rand(100, 300),
            'period' => rand(3, 12),
            'description' => $this->faker->sentences(3, true)
        ];
    }
}
