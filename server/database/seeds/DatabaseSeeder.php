<?php

use App\Owner;
use App\Manufacturer;
use App\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //OwnersTableSeeder::class,
            //ManufacturersTableSeeder::class,
            VehiclesTableSeeder::class,
        ]);
    }
}
