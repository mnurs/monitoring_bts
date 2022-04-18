<?php

namespace Database\Factories;

use App\Models\KuesionerPilihan;
use App\Models\Kuesioner;
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
        $kuesioner = Kuesioner::select('id')->inRandomOrder()->first(); 
        return [
            'id_kuesioner' => $kuesioner->id,
            'pilihan_jawaban' => $this->faker->text,
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'edited_by' => $this->faker->word,
            'edited_at' => $this->faker->date('Y-m-d H:i:s') 
        ];
    }
}
