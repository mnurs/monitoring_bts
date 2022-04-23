<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kuesioner;
use App\Models\KuesionerPilihan;
use App\Models\KuesionerJawaban;
use App\Models\Pemilik;
use App\Models\Jenis;
use App\Models\Bts;
use App\Models\Kondisi;
use App\Models\Monitoring;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // php artisan db:seed --class=DatabaseSeeder
    public function run()
    { 
        // User::factory(10)->create();
        // Kondisi::factory(5)->create();
        // Pemilik::factory(5)->create();
        // Jenis::factory(5)->create();
        // Bts::factory(5)->create();
        // Monitoring::factory(5)->create();
        // KuesionerPilihan::factory(25)->create();
        // Kuesioner::factory(5)->create();
         KuesionerJawaban::factory(10)->create();
    }
}
