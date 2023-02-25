<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    private static $columns = [
        'type',
        'time',
        'contract',
        "room",
        'amount',
        'discount',
        'total',
        'bank_account',
        'concept',
        'represent',
        'notes'
    ];

    public function index()
    {
        $result = DB::table('payments')->
        select(self::$columns)->
        orderBy('time', 'desc')->paginate(10);
        return view('bitza.payments.index', ['result' => $result]);
    }
}
