<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kuesioner;
use App\Models\KuesionerPilihan;
use App\Models\KuesionerJawaban;
use App\Models\Pemilik;
use App\Models\Jenis;
use App\Models\Bts;
use App\Models\Foto;
use App\Models\Kondisi;
use App\Models\Monitoring;
use App\Models\Konfigurasi;
use App\Models\User;

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
        User::factory(5)->create();
        Kondisi::factory(5)->create();
        Pemilik::factory(5)->create();
        Jenis::factory(5)->create();
        Bts::factory(5)->create();
        Foto::factory(5)->create();
        Konfigurasi::factory(5)->create();
        Monitoring::factory(5)->create();
        Kuesioner::factory(5)->create();
        KuesionerPilihan::factory(25)->create();
         KuesionerJawaban::factory(10)->create();

        //  $this->call([
        //     PermissionsTableSeeder::class,
        //     RolesTableSeeder::class,
        //     PermissionRoleTableSeeder::class,
        //     UsersTableSeeder::class,
        //     RoleUserTableSeeder::class,
        //     UsersTableSeed::class,
        // ]);
    }

}
