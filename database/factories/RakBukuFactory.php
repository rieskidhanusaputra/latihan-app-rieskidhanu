<?php

namespace Database\Factories;

use App\Models\RakBuku;
use Illuminate\Database\Eloquent\Factories\Factory;

class RakBukuFactory extends Factory
{
    protected $model = RakBuku::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'lokasi' => $this->faker->word,
            'keterangan' => $this->faker->sentence,
        ];
    }
}
