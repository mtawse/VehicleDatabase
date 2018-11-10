<?php

use App\Owner;
use App\Vehicle;
use App\Model;
use App\Manufacturer;
use Illuminate\Database\Seeder;
use Database\Seeds\VehicleXmlImportable;

class VehiclesTableSeeder extends Seeder
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

            $model = $this->importModel($vehicle);
            $owner = $this->importOwner($vehicle);

            $vehicleModel = new Vehicle;
            $vehicleModel->manufacturer_id = $model->manufacturer_id;
            $vehicleModel->model_id = $model->id;
            $vehicleModel->owner_id = $owner->id;
            $vehicleModel->type = $vehicle['type'];
            $vehicleModel->usage = $vehicle['usage'];
            $vehicleModel->license_plate = $vehicle['license_plate'];
            $vehicleModel->weight_category = (int) $vehicle['weight_category'];
            $vehicleModel->no_seats = (int) $vehicle['no_seats'];
            $vehicleModel->has_boot = filter_var($vehicle['has_boot'], FILTER_VALIDATE_BOOLEAN);
            $vehicleModel->has_trailer = filter_var($vehicle['has_trailer'], FILTER_VALIDATE_BOOLEAN);
            $vehicleModel->transmission = $vehicle['transmission'];
            $vehicleModel->colour = $vehicle['colour'];
            $vehicleModel->is_hgv = filter_var($vehicle['is_hgv'], FILTER_VALIDATE_BOOLEAN);
            $vehicleModel->no_doors = (int) $vehicle['no_doors'];
            $vehicleModel->sunroof = filter_var($vehicle['sunroof'], FILTER_VALIDATE_BOOLEAN);
            $vehicleModel->has_gps = filter_var($vehicle['has_gps'], FILTER_VALIDATE_BOOLEAN);
            $vehicleModel->no_wheels = (int) $vehicle['no_wheels'];
            $vehicleModel->engine_cc = (int) $vehicle['engine_cc'];
            $vehicleModel->fuel_type = $vehicle['fuel_type'];
            $vehicleModel->save();
        }
    }

    private function importManufacturer($vehicle)
    {
        $manufacturer = Manufacturer::firstOrNew(['name' => $vehicle['::manufacturer']]);
        $manufacturer->name = $vehicle['::manufacturer'];
        $manufacturer->save();
        return $manufacturer;
    }

    private function importModel($vehicle)
    {
        $manufacturer = $this->importManufacturer($vehicle);
        $vmodel = Model::firstOrNew(['name' => $vehicle['::model']]);
        $vmodel->manufacturer_id = $manufacturer->id;
        $vmodel->name = $vehicle['::model'];
        $vmodel->save();
        return $vmodel;
    }

    private function importOwner($vehicle)
    {
        $parser = new TheIconic\NameParser\Parser();
        $name = $parser->parse($vehicle['owner_name']);
        $owner = new Owner;
        $owner->salutation = $name->getSalutation();
        $owner->first_name = $name->getFirstname();
        $owner->last_name = $name->getLastname();
        $owner->initials = $name->getInitials();
        $owner->suffix = $name->getSuffix();
        $owner->profession = $vehicle['owner_profession'];
        $owner->company = $vehicle['owner_company'];
        $owner->save();
        return $owner;
    }
}
