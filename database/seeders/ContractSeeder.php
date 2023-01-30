<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = DB::table('rooms')->where('status', 'A')->get();
        $contractForm = DB::table('contract_forms')->first();

        foreach ($rooms as $room) {
            $contact = DB::table('contacts')->inRandomOrder()->first();
            $values = [
                'date_begin' => date("Y-m-d H:i:s", mt_rand(1611161736, 1674233736)),
                'document_id' => $contractForm->id,
                'number' => 'Cnt'.mt_rand(19, 22)."-".rand(0, 50),
                'building_id' => $room->building_id,
                'room' => $room->shortname,
                'paydate' => mt_rand(1, 30),
                'price' => $room->price1,
                'deposit' => $room->price2,
                'discount' => mt_rand(0, 2) * 1000,
                'contact_id' => $contact->id,
                'status' => 'A',
            ];
            DB::table('contracts')->insert($values);
        }
    }
}
