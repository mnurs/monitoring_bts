<?php

namespace Database\Factories;

use App\Models\Bts;
use App\Models\Wilayah;
use App\Models\User;
use App\Models\Pemilik;
use App\Models\Jenis;
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
        $wilayah = Wilayah::select('id')->inRandomOrder()->first();
        $user = User::select('id')->inRandomOrder()->first();
        $pemilik = Pemilik::select('id')->inRandomOrder()->first();
        $jenis = Jenis::select('id')->inRandomOrder()->first();
        return [
            'id_user_pic' => $user->id,
            'id_pemilik' => $pemilik->id,
            'id_wilayah' => $wilayah->id,
            'id_jenis_bts' => $jenis->id,
            'nama' => $this->faker->word,
            'alamat' => $this->faker->text,
            'latitude' => $this->faker->randomDigitNotNull,
            'longitude' => $this->faker->randomDigitNotNull,
            'tinggi_tower' => $this->faker->randomDigitNotNull,
            'panjang_tanah' => $this->faker->randomDigitNotNull,
            'lebar_tanah' => $this->faker->randomDigitNotNull,
            'ada_genset' => $this->faker->boolean(),
            'ada_tembok_batas' => $this->faker->boolean(),
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'edited_by' => $this->faker->word,
            'edited_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
