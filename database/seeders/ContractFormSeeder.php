<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'name' => 'Контракт 2023',
            'descrip' => 'Контракт от Pedro Gonzalez'
        ];
        DB::table('contract_forms')->insert($values);
    }
}
