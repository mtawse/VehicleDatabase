<?php

use App\Owner;
use Illuminate\Database\Seeder;
use Database\Seeds\VehicleXmlImportable;

class OwnersTableSeeder extends Seeder
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
        }
    }
}
