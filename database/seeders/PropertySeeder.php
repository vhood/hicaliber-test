<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;

class PropertySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = __DIR__ . '/data/property-data.csv';
        $this->delimiter = ',';
        $this->aliases = [
            'Name' => 'name',
            'Price' => 'price',
            'Bedrooms' => 'bedrooms',
            'Bathrooms' => 'bathrooms',
            'Storeys' => 'storeys',
            'Garages' => 'garages',
        ];

        $this->tablename = 'properties';
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        parent::run();
    }
}
