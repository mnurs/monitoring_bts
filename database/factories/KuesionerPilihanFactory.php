<?php

namespace Database\Factories;

use App\Models\KuesionerPilihan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KuesionerPilihanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KuesionerPilihan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_kuesioner' => $this->faker->randomDigitNotNull,
        'pilihan_jawaban' => $this->faker->text,
        'created_by' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'edited_by' => $this->faker->word,
        'edited_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
