<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    function getLastPayments(Request $request) {
        $days = $request->query('days');
        $date = date("Y-m-d", strtotime("-$days days"));
        $payments = Payment::
            select(['id', 'date', 'amount', 'discount', 'total', 'room', 'concept', 'book_account', 'notes'])
            ->where('date', '>=', $date)
            ->orderByDesc('time')
            ->paginate(10);
        return response()->json(['payments' => $payments]);
    }
}
