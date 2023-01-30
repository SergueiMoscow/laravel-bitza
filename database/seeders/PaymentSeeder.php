<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contracts = DB::table('contracts')->where('status', 'A')->get();
        foreach ($contracts as $contract) {
            $this->insertContractPayments($contract);
        }
    }

    private function insertContractPayments($contract)
    {
        $dateBegin = $contract->date_begin;
        $payDate = $contract->paydate;
        $currentPayDate = strtotime($dateBegin);
        $accounts = ['Pedro', 'Juan', 'Antonio'];
        while ($currentPayDate < date("Y-m-d")) {
            $values = [
                'type' => 'Rent',
                'time' => date("Y-m-d H:i:s", $currentPayDate),
                'contract' => $contract->number,
                'room' => $contract->room,
                'building_id' => $contract->building_id,
                'date' => date("Y-m-d", $currentPayDate),
                'amount' => $contract->price,
                'discount' => $contract->discount,
                'total' => $contract->price - $contract->discount,
                'bank_account' => 'Cash',
                'book_account' => Arr::random($accounts),
                'concept' => 'Rent ' . $contract->room,
                'represent' => Arr::random($accounts),
                'notes' => fake()->text(50),
                'status' => 'New'
            ];
            $currentPayDate = strtotime("+1 month", $currentPayDate);
            DB::table('payments')->insert($values);
        }
    }
}
