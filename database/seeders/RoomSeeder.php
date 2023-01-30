<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            $building = DB::table('buildings')->inRandomOrder()->first();
            $values = [
                'building_id' => $building->id,
                'shortname' => sprintf("R%02d", $i),
                'floor' => mt_rand(1, 3),
                'number' => $i, 
                'square' => mt_rand(20, 30),
                'price1' => mt_rand(14, 25) * 1000,
                'price2' => mt_rand(14, 25) * 1000,
                'wc' => 'Y', 
                'name' => 'Room $i',
                'descript' => fake()->text(mt_rand(30, 80)),
                'address1' => $building->address1,
                'address2' => $building->address2, 
                'represent' => 'Pedro Gonsalez',
                'notes' => fake()->text(50),
                'status' => 'A'
            ];
            DB::table('rooms')->insert($values);
        }
    }
}
