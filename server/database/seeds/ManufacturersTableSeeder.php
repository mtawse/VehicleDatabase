<?php

use App\Manufacturer;
use Illuminate\Database\Seeder;
use Database\Seeds\VehicleXmlImportable;

class ManufacturersTableSeeder extends Seeder
{
    use VehicleXmlImportable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = $this->loadXml();
        foreach ($vehicles['vehicles'] as $vehicle) {
            $manufacturer = Manufacturer::firstOrNew(['name' => $vehicle['::manufacturer']]);
            $manufacturer->save();
        }
    }
}
