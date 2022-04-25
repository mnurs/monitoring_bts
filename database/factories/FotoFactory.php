<?php

namespace Database\Factories;

use App\Models\Foto;
use App\Models\Bts;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Foto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bts = Bts::select('id')->inRandomOrder()->first();
        return [
            'id_bts' => $bts->id,
            'path_foto' => $this->faker->text,
            'created_by' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'edited_by' => $this->faker->word,
            'edited_at' => $this->faker->date('Y-m-d H:i:s') 
        ];
    }
}
