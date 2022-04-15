<?php

namespace Database\Factories;

use App\Models\Konfigurasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class KonfigurasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Konfigurasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'value' => $this->faker->word,
        'created_by' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'edited_by' => $this->faker->word,
        'edited_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
