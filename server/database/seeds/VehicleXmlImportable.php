<?php

namespace Database\Seeds;

use Orchestra\Parser\Xml\Facade as XmlParser;

trait VehicleXmlImportable
{
    public $xml_fields = [
        '::manufacturer',
        '::model',
        'type',
        'usage',
        'license_plate',
        'weight_category',
        'no_seats',
        'has_boot',
        'has_trailer',
        'owner_name',
        'owner_company',
        'owner_profession',
        'transmission',
        'colour',
        'is_hgv',
        'no_doors',
        'sunroof',
        'has_gps',
        'no_wheels',
        'engine_cc',
        'fuel_type',
    ];

    public function loadXml()
    {
        $fields = implode(',', $this->xml_fields);
        $xml = XmlParser::load(database_path('seeds/VehicleSample.xml'));
        return $xml->parse([
            'vehicles' => ['uses' => "Vehicle[$fields]"],
        ]);
    }
} 