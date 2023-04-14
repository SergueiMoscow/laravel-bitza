<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
    private static $columns = [
        'type',
        'time',
        'contract',
        'date',
        'room',
        'amount',
        'discount',
        'total',
        'bank_account',
        'concept',
        'represent',
        'notes'
    ];
    public function index(Request $request)
    {
        if ($request->kvartal) {
            $kvartal = $request->kvartal;
            $year = $request->year;
        } else {
            $y_kv = $this->getPreviousKvartal();
            $kvartal = $y_kv['kv'];
            $year = $y_kv['year'];
        }
        $dates = $this->getDatesOfKvartal(['kv' => $kvartal, 'year' => $year]);
        $total = $this->getSumOfKvartal($dates);
        $result = DB::table('payments')->
        select(self::$columns)->
        whereBetween('time', $dates)->
        orderBy('time')->
        paginate(50);
        return view('bitza.tax.index', ['result' => $result, 'kvartal' => $kvartal, 'year' => $year, 'total' => $total]);
    }

    private function getPreviousKvartal()
    {
        $month = (date('m'));
        if ($month >= 1 && $month <= 3) {
            return ['kv' => 4, 'year' => date("Y") - 1];
        }
        if ($month >= 4 && $month <= 6) {
            return ['kv' => 1, 'year' => date("Y")];
        }
        if ($month >= 7 && $month <= 9) {
            return ['kv' => 2, 'year' => date("Y")];
        }
        if ($month >= 10 && $month <= 12) {
            return ['kv' => 3, 'year' => date("Y")];
        }
    }

    private function getDatesOfKvartal(array $kv): array
    {
        if ($kv['kv'] == 1) {
            return [
                $kv['year'] . '-01-01 00:00:00',
                $kv['year'] . '-03-31 23:59:59',
            ];
        }
        elseif ($kv['kv'] == 2) {
            return [
                $kv['year'] . '-04-01 00:00:00',
                $kv['year'] . '-06-30 23:59:59',
            ];
        }
        elseif ($kv['kv'] == 3) {
            return [
                $kv['year'] . '-07-01 00:00:00',
                $kv['year'] . '-09-30 23:59:59',
            ];
        }
        elseif ($kv['kv'] == 4) {
            return [
                $kv['year'] . '-10-01 00:00:00',
                $kv['year'] . '-12-31 23:59:59',
            ];
        }
        return [];
    }

    private function getSumOfKvartal(array $dates):int
    {
        $result=DB::select("SELECT sum(`total`) AS total FROM payments WHERE `time` BETWEEN '{$dates[0]}' AND '{$dates[1]}'");
        return $result[0]->total;
    }
}
