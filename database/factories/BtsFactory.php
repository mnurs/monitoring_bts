<?php

namespace Database\Factories;

use App\Models\Bts;
use Illuminate\Database\Eloquent\Factories\Factory;

class BtsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user_pic' => $this->faker->word,
        'id_pemilik' => $this->faker->randomDigitNotNull,
        'id_wilayah' => $this->faker->word,
        'id_jenis_bts' => $this->faker->randomDigitNotNull,
        'nama' => $this->faker->word,
        'alamat' => $this->faker->text,
        'latitude' => $this->faker->word,
        'longitude' => $this->faker->word,
        'tinggi_tower' => $this->faker->randomDigitNotNull,
        'panjang_tanah' => $this->faker->randomDigitNotNull,
        'lebar_tanah' => $this->faker->randomDigitNotNull,
        'ada_genset' => $this->faker->word,
        'ada_tembok_batas' => $this->faker->word,
        'created_by' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'edited_by' => $this->faker->word,
        'edited_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
