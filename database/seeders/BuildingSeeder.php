<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = 'INSERT INTO buildings (`name`, `address1`, `address2`, `zip`, `notes`, `status`) VALUES (?, ?, ?, ?, ?, ?)';
        $values = [
            'name' => 'Frankfurt', 
            'address1' => 'ул. Ленина 20', 
            'address2' => 'Франкфурт',
            'zip' => '321123', 
            'notes' => '3 этажа',
            'status' => 'A'
        ];
        DB::table('buildings')->insert($values);
    }
}
