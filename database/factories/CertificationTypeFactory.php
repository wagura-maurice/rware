<?php

namespace Database\Factories;

use App\Models\CertificationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CertificationType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->domainWord,
            'description' => $this->faker->sentences(3, true)
        ];
    }
}
