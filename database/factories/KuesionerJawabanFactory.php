<?php

namespace Database\Factories;

use App\Models\KuesionerJawaban;
use App\Models\Monitoring;
use App\Models\Kuesioner;
use Illuminate\Database\Eloquent\Factories\Factory;

class KuesionerJawabanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KuesionerJawaban::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kuesioner = Kuesioner::select('id')->inRandomOrder()->first();
        $monitoring = Monitoring::select('id')->inRandomOrder()->first(); 
        return [
            'id_monitoring' => $monitoring->id,
            'id_kuesioner' => $kuesioner->id,
            'jawaban' => $this->faker->randomDigitNotNull,
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'edited_by' => $this->faker->word,
            'edited_at' => $this->faker->date('Y-m-d H:i:s') 
        ];
    }
}
