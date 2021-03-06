<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create();

        $manufacturers = factory(App\Manufacturer::class, 7)->create();

        factory(App\Vehicle::class, 20)->create([
            'manufacturer_id' => $manufacturers->random()->id,
        ]);
    }
}
