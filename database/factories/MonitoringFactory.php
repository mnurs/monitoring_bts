<?php

namespace Database\Factories;

use App\Models\Monitoring;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonitoringFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Monitoring::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_bts' => $this->faker->randomDigitNotNull,
        'id_kondisi_bts' => $this->faker->randomDigitNotNull,
        'id_user_surveyor' => $this->faker->word,
        'tgl_generate' => $this->faker->word,
        'tgl_kunjungan' => $this->faker->word,
        'tahun' => $this->faker->randomDigitNotNull,
        'created_by' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'edited_by' => $this->faker->word,
        'edited_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
