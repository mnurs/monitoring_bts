<?php

namespace Database\Factories;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jenis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'edited_by' => $this->faker->word,
            'edited_at' => $this->faker->date('Y-m-d H:i:s') 
        ];
    }
}
