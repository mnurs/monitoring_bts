<?php

namespace Database\Factories;

use App\Models\Monitoring;
use App\Models\Bts;
use App\Models\Kondisi;
use App\Models\User;
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
        $bts = Bts::select('id')->inRandomOrder()->first();
        $kondisi = Kondisi::select('id')->inRandomOrder()->first();
        $user = User::select('id')->inRandomOrder()->first();
        return [
            'id_bts' => $bts->id,
            'id_kondisi_bts' => $kondisi->id,
            'id_user_surveyor' => $user->id,
            'tgl_generate' => $this->faker->date('Y-m-d'),
            // 'tgl_kunjungan' => $this->faker->word,
            // 'tahun' => $this->faker->randomDigitNotNull,
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'edited_by' => $this->faker->word,
            'edited_at' => $this->faker->date('Y-m-d H:i:s') 
        ];
    }
}
